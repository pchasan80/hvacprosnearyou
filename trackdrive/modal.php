<?php

    $schedule_lead_token = '11a6abfb243848b7a92af311932bb9fe';

    require('trackdrive.php');


    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check Injection
        function sanitize($data) {
            $data   = trim($data);
            $data   = stripslashes($data);
            $data   = htmlspecialchars($data);
            return $data;
        }

        // Get The form data
        $caller_id       = sanitize($_POST['caller_id']);

        // Check that data was sent to the mailer.
        $errors = array();

        if(isset($_POST['caller_id'])) {
            $fields = array(
                'caller_id'      => $_POST['caller_id'],
            );

            foreach ($fields as $field => $data) {
                if(empty($data)) {
                    // $errors[] = "The " . $field . " is required";
                    $errors[] = "Please fill-up the form correctly.";
                    break 1;
                }
            }

            if(empty($errors) === true) {
                if(strlen($caller_id) != 10) {
                    $errors[] = "Please insert a valid phone number";
                }
            }


            if(empty($errors) === true) {


                // extract the affiliate id from the URL
                if (array_key_exists('afid', $_GET)){ 
                    $afid = $_GET['afid'];
                } else {
                    $afid = 'none';
                }


                // Optional additional settings.
                $options = array(
                    'expires_in' => 3600,
                    'data' => array(
                        'afid' => isset($_GET['afid']) ? $_GET['afid'] : '',
                        'zip' => isset($_POST['zip']) ? $_POST['zip'] : ''
                    )
                );                

                $caller_id = "+1" . $caller_id;

                $response = submit_scheduler_lead($schedule_lead_token, $caller_id, $options);

                if (is_array($response)){

                    if (isset($response['status']) && $response['status'] == 201 || $response['status'] == 200){
                        $success = true;
                    } elseif (isset($response['errors']) && !empty($response['errors']) ) {
                        $errors[] = $response['errors'];
                    }
                }

                
            }


        }

        // If Get Errors 
        if(empty($errors) === false) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo implode(" ",$errors);
            exit;
        }

        // If didn't Get Errors then sending mail
        if(empty($errors) === true) {

            echo "Thank You! We are calling you in shortly";

        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        // echo "There was a problem with your submission, please try again.";
        header('Location: ../');
    }

?>