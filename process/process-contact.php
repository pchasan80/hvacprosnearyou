<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    use ipinfo\ipinfo\IPinfo;
    
    //Load Composer's autoloader
    require '../vendor/autoload.php';

    // Load .env variables
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..');
    $dotenv->load();

    // Load Cloudflare KV helper
    require __DIR__ . '/cloudflare-secrets.php';

    // Allow only your frontend's origin
    $allowed_origin = getenv('ALLOWED_ORIGINS');

    if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
        header("Access-Control-Allow-Origin: $allowed_origin");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
    }

    // Handle preflight requests
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], $allowed_origin) !== 0) {
        http_response_code(403);
        echo "Forbidden: Invalid request origin.";
        exit;
    }

    // Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check Injection
        function sanitize($data) {
            $data   = trim($data);
            $data   = stripslashes($data);
            $data   = htmlspecialchars($data);
            return $data;
        }

        // Get The form data
        $name       = sanitize($_POST['name']);
        $email      = sanitize($_POST['email']);
        $subject    = sanitize($_POST['subject']);
        $message    = sanitize($_POST['message']);

        $referrer = sanitize($_POST['referrer']);
        $user_agent = sanitize($_POST['user_agent']);
        $display = sanitize($_POST['display']);

        // Check that data was sent to the mailer.
        $errors = array();

        if(isset($_POST['name'], $_POST['email'], $_POST['message'])) {
            $fields = array(
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'message'   => $_POST['message']
            );

            foreach ($fields as $field => $data) {
                if(empty($data)) {
                    // $errors[] = "The " . $field . " is required";
                    $errors[] = "Please fill-up the form correctly.";
                    break 1;
                }
            }

            // Check Valid E-mail
            if(empty($errors) === true) {
                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Oops! Invalid E-mail!";
                }
            }

            // Google reCaptcha validation
            if(empty($errors) === true) {
                $secret = getenv('RECAPTCHA_SECRET');
                $response = $_POST['g-recaptcha-response'];

                $remoteip = $_SERVER['REMOTE_ADDR'];
                
                $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
                $result = json_decode($url, TRUE);

                if ($result['success'] != 1) {
                    $errors[] = "Please make sure that you are not a robot."; 
                }
            }

        }

        // If Get Errors 
        if(empty($errors) === false) {
            $errors_msg = implode(" ",$errors);
            echo json_encode(['status' => 'error', 'message' => $errors_msg]);
            exit;
        }

        // If didn't Get Errors then sending mail
        if(empty($errors) === true) {
            // Get the user location using the detected IP (validate before using)
            $access_token = getenv('IPINFO_ACCESS_TOKEN');
            $client = new IPinfo($access_token);

            // Get the user IP address
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $user_ip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                $user_ip = $_SERVER['REMOTE_ADDR'];
            }

            // If IP is not valid for public lookup, fall back to unknown
            if (!filter_var($user_ip, FILTER_VALIDATE_IP)) {
                $geo_location = 'Unknown';
            } else {
                try {
                    $details = $client->getDetails($user_ip);
                    $geo_location = (isset($details->city) ? $details->city : '') . (isset($details->region) ? ", " . $details->region : '') . (isset($details->country) ? ", " . $details->country : '');
                    if (empty(trim($geo_location))) {
                        $geo_location = 'Unknown';
                    }
                } catch (Exception $e) {
                    // IPinfo failed — set unknown and continue
                    $geo_location = 'Unknown';
                }
            }

            // Build the email content.
            $vars = array(
                '%name%'            => $name,
                '%email%'           => $email,
                '%subject%'         => $subject,
                '%message%'         => $message,
                '%user_ip%'         => $user_ip,
                '%geo_location%'    => $geo_location,
                '%referrer%'        => $referrer,
                '%user_agent%'      => $user_agent,
                '%display%'         => $display
            );

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";

            // Cloudflare KV secrets
            $smtpUsername = getCloudflareKvValue('SMTP_USERNAME');
            $smtpPassword = getCloudflareKvValue('SMTP_PASSWORD');

            if (empty($smtpUsername) || empty($smtpPassword)) {
                echo json_encode(['status' => 'error', 'message' => 'SMTP credentials are missing.']);
                exit;
            }

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = getenv('SMTP_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUsername;
            $mail->Password   = $smtpPassword;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = getenv('SMTP_PORT');
            
            //Set who the message is to be sent from
            $mail->setFrom(getenv('SET_FROM_EMAIL'), getenv('SET_FROM_NAME'));
            //Set an alternative reply-to address
            $mail->addReplyTo($email, $name);
            //Set who the message is to be sent to
            $mail->addAddress(getenv('ADD_ADDRESS'));
            $ccAddresses = trim((string)getenv('CC_ADDRESSES'));
            if ($ccAddresses !== '') {
                $ccList = array_filter(array_map('trim', explode(',', $ccAddresses)));
                foreach ($ccList as $ccEmail) {
                    $mail->addCC($ccEmail);
                }
            }
            //Set the subject line
            $mail->Subject = 'You have a new message from ' . $_SERVER['SERVER_NAME'] . " (" . $name . ")";
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $mail->msgHTML(strtr(file_get_contents('process-contact-email.html'), $vars));
            //Replace the plain text body with one created manually
            // $mail->AltBody = 'This is a plain-text message body';
            //Attach an image file
            // $mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) {
                echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
            } else {
                echo json_encode(['status' => 'success', 'message' => 'Thank You! Your message has been sent.']);
            }
            // PHPMailer END 
        }
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        // echo "There was a problem with your submission, please try again.";
        header('Location: ../');
    }
?>