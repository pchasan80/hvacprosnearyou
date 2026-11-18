<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <title>HVACRepairNearYou</title>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N47BQBW4');</script>
<!-- End Google Tag Manager -->

</head>
<body>
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N47BQBW4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->	 	<?php
	$msg="";

	if(isset($_POST['submit']))
	{    
		$from_add = "navdeep@smartadmedia.com"; 
		$to_add = "navdeep@smartadmedia.com"; 
		// remove duplicate line below
		// $to_add = "navdeep@smartadmedia.com";
		$subject = "Enquiry HVACRepairNearYou";
		$message = "Form details below.\n\n";
		$message .= "Name: ".$_POST['name']."\n";        
		$message .= "Email: ".$_POST['email']."\n";
		$message .= "Telephone: ".$_POST['phone']."\n";
		$message .= "Message: ".$_POST['message']."\n";
		$headers = "From: $from_add \r\n";
		$headers .= "Reply-To: $from_add \r\n";
		$headers .= "Return-Path: $from_add\r\n";
		$headers .= "X-Mailer: PHP \r\n";

		// send the email and check if it was sent successfully
		if (mail($to_add,$subject,$message,$headers)) {
			// get the user's email address from the form data
			$strToCus  = trim($_POST['email']);
			$strHeaderCus  = "MIME-Version: 1.0\r\n";
			$strHeaderCus .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$strHeaderCus .= "From:  <navdeep@smartadmedia.com>\r\n";
			$strHeaderCus .= "Cc:  \r\n";
			$strSubjectCus = "Thank you for contacting us";
			$thank = "<u><i>This is an automated email, please do not reply </u></i><br><br><br> Dear ".ucwords(trim($_POST['name'])).",<br><br>Thank you for writing to HVACRepairNearYou.
			This is an auto acknowledgment of the receipt of your request.<br>
			We assure you that your communication is important to us and shall be given due attention. The concerned person from our team will get in touch with you shortly to take things forward.<br><br>Thanks and Warm Regards,<br>Team HVACRepairNearYou.";
			// send mail to the user
			mail($strToCus, $strSubjectCus, $thank, $strHeaderCus);

			echo '<script>';
			echo 'swal("Thank You", "Your message has been sent!", "success")';
			echo '</script>';
		}
		else {
			// display an error message if the mail was not sent successfully
			echo "There was an error sending the email. Please try again later.";
		}
		// redirect the user to the homepage after the form is submitted
		// echo("<script>location.href='index.php';</script>");
	}
	?>
</body>
</html>
