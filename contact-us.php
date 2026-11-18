
<!DOCTYPE html>
<html lang="en">
<head>


<!--copy & pest controller -->
<script type="text/JavaScript">
//courtesy of BoogieJack.com
function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
</script>
<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
	    <!--copy & Pest controller end-->
		<title>Contact Us || HVACPros Near You </title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/theme.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
		<style>
			.review i {
				background-color: #628f23;
				font-size: 15px;
				padding: 5px;
			}
			.review p {
				font-size: 16px;
				margin-top: 15px;
			}
			a.my_link_1 {
				line-height: 1.2;
			}
			.my_link_2 {
				margin-bottom: 25px;
			}

			.contactForm{
				background: #fff;
				border-radius: 20px;
			}
			.contactForm .mainBox{
				background: #17004e;
				padding: 30px;
				border-top-left-radius: 20px;
				border-top-right-radius: 20px;
			}
			.contactForm .mainBox h2{
				color: #fff;
				text-transform: uppercase;
				font-weight: 600;
			}
			.contactForm .mainBox p{
				color: #fff;
			}
			.contactForm .borderTriangle {
				width: 0;
				margin: 0 auto;
				border: 12px solid transparent;
				border-top-color: #1d005f;
			}
			.contactForm .formBox {
				position: relative;
				padding: 40px;
				padding-top: 20px;
				/* background: rgba(0, 0, 0, 0.5); */
				box-sizing: border-box;
				border-radius: 10px;
			}
			.contactForm .formBox h2 {
				margin: 0 0 30px;
				padding: 0;
				color: #fff;
				text-align: center;
			}
			.contactForm .formBox .userBox {
				position: relative;
			}
			.contactForm .formBox .userBox input {
				width: 100%;
				padding: 10px 0;
				font-size: 16px;
				color: #c3c3c3;
				margin-bottom: 30px;
				border: none;
				border-bottom: 1px solid #c3c3c3;
				outline: none;
				background: transparent;
			}
			.contactForm .formBox .userBox label {
				position: absolute;
				top: 0;
				left: 0;
				padding: 10px 0;
				font-size: 16px;
				color: #c3c3c3;
				pointer-events: none;
				transition: 0.5s;
			}
			.contactForm .formBox .userBox input:focus ~ label,
			.formBox .userBox input:valid ~ label {
				top: -20px;
				left: 0;
				color: #c3c3c3;
				font-size: 12px;
			}
			.contactForm .formBox form button {
				position: relative;
				width: 100%;
				display: inline-block;
				text-align: center;
				border-radius: 50px;
				padding: 10px 20px;
				font-weight: 600;
				color: #ffffff;
				font-size: 16px;
				text-decoration: none;
				text-transform: uppercase;
				overflow: hidden;
				transition: 0.5s;
				margin-top: 20px;
				letter-spacing: 4px;
				background-color: #e1292b;
				border: none;
				box-shadow: 0 4px 0 rgba(0,0,0,0.25),
							0 4px 0 rgba(218,79,73,1),
							0 4px 6px rgba(0,0,0,0.45);
			}
			.contactForm .formBox form button .fa-paper-plane{
				font-size: 12px;
			}
			.contactForm .formBox button:hover {
				background: #ff3b3f;
				color: #fff;
				border-radius: 50px;
			}
		</style>

		<!-- End Google Call Tracking Snippet -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">


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
<!-- End Google Tag Manager (noscript) -->	

		<?php
			// GEO Location
			$user_ip        = getenv('REMOTE_ADDR');
			$geo            = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
			$city           = $geo["geoplugin_city"];
			$region         = $geo["geoplugin_regionName"];
			$country        = $geo["geoplugin_countryName"];
			/*$geo_location   = $city . ", " . $region; */
			$geo_location   = $city;
		?>
		<!-- Section Header Start -->
		<section class="content" id="header">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 logo">
						<a href="index.php"><img alt="Logo" src="assets/images/logo.png"></a>
					</div>
					<div class="col-sm-6 call-btn">
						<span class="red">Call 24/7:</span><span><a class="gnumber" href="tel:+18559071910">(855) 907-1910</a></span>
					</div>
				</div>
			</div>
		</section>
		<!-- //Section Header End -->


		<!-- Section Conatct Us Start -->
		<section id="privacy" class="content content-alt">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>CONTACT US</h2>
						<br/>
						<p>We'd love to hear from you!</p>
						<p>Whether you have a question, a comment, complaint or a suggestion, we're always happy to listen and help.</p>
						<p>You can reach-out to us at :-</p>
						<p><strong>Email :</strong> nav.sahni23@gmail.com</p>
						<p><strong>Phone :</strong> +91 9013201200 (WhatsApp Preferred)</p>
						<p><strong>Website :</strong> Smartadmedia.com</p>
						<p>Send us an email or forward your query below, an expert will reach out shortly. We appreciate your candid feedback and opinions! Please send them through. We try to respond within 48 hours, longer on weekends</p>
						<p>For brand/ trademark related concerns you can reach-out to our marketing partner i.e +91 9013201200 (via WhatsApp)</p>
						<br>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-5">
						<div class="contactForm">
							<!-- <form action="sendmail/sendmail.php" method="POST" id="contactForm">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
								</div>
								<div class="form-group">
									<textarea class="form-control" id="message" name="message" rows="7" placeholder="Message" required></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
								<div id="responseMsg"></div>
							</form> -->
							<div class="mainBox">
								<h2 class="text-center">Get In Touch</h2>
								<p class="text-center m-0">If you need us you can always call us or fill in the underneath</p>
							</div>
							<div class="borderTriangle"></div>
							<div class="formBox">
								<form action="process/process-contact.php" method="POST" id="contactForm">
									<input type="hidden" class="current-url" name="referrer">
									<input type="hidden" class="user-agent" name="user_agent">
									<input type="hidden" class="display" name="display">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
									</div>
									<div class="form-group">
										<textarea class="form-control" id="message" name="message" rows="7" placeholder="Message" required></textarea>
									</div>
									<div class="form-group">
										<div class="g-recaptcha" data-sitekey="6LcA11opAAAAAA3JhRDagu4-VON_fMmHarTwVb16"></div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary mt-3 submit-btn">Submit</button>
									</div>
									<div id="responseMsg"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- //Section Conatct Us End -->		


		<!-- Section Footer-top Start -->
		<section class="content content-alt" id="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1>HVAC Pros Near You</h1><br>
						<h2>Help Is Available 24/7. Call Now.</h2><br>
						<h2><a class="my_link_3 call-animation gnumber" href="tel:+18559071910">call us: (855) 907-1910</a></h2>
						<p></p>
						<div class="call-us" id="sticky-call">
							<a class="btn gnumber" href="tel:+18559071910">
								<span class="call-btn-desktop">call us: (855) 907-1910</span>
								<span class="call-btn-mobile">Tap Here To Call</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- //Section Footer-top End -->

		<!-- Section Footer Start -->
		<section id="footer" class="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-sm-12">
						<p>© HVACprosnearyou.com All rights reserved</p>
					</div>
					<div class="col-lg-7 col-sm12">
						<ul class="footer-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="about-us.php">About Us</a></li>
							<li><a href="contact-us.php">Contact Us</a></li>
							<li><a href="privacy.php">Privacy Policy</a></li>
							<li><a href="terms.php">Terms and Condition</a></li>
						</ul>
					</div>
					<div class="col-lg-12">
						<br>
						<p>
							Disclaimer : HVACprosnearyou.com is a free service that helps users connect with local heating & cooling contractors. All contractors are independent and we don’t warrant or guarantee any work performed. It is the responsibility of the homeowner to verify that the contractor they hire has the necessary license and insurance required for the work being performed. Any third party products, brands or trademarks listed above are the sole property of their respective owner. No affiliation or endorsement is intended or implied.
						</p><br>
						<p>
							Consent To Receive Automated SMS/Calls: By providing my phone number to HVACprosnearyou.com, I agree and acknowledge that HVACprosnearyou.com or their partner site/parties may call my phone number for any purpose, including marketing purposes, using all methods now known and discovered in the future, including, but not limited to, auto-dialers, pre-recordings, and general telemarketing practices. I agree that these calls may be regarding the products and/or services that I have previously inquired or purchased and products and/or services that HVACprosnearyou.com may market to me. I acknowledge that this consent may be removed at my request but that until such consent is revoked, I may receive calls from HVACprosnearyou.com or our third party partners at my number. For any brand/ trademark related issues kindly report us at Smartadmedia.com or +91 9013201200 (Whatsapp preferred)
						</p>
						<br><br><br><br>
					</div>
				</div>
			</div>
		</section>
		<!-- //Section Footer End -->

		<!-- Modal -->
		<div class="modal fade" id="helpServices" tabindex="-1" role="dialog" aria-labelledby="helpServicesTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times"></i>
					</button>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<h3>We Are Here To Help!</h3>
								<h4>Would you like to receive no obligation estimate from us in next 60 seconds?</h4><br/>
								<h4>Click Here To Call</h4><br/>

								<div class="call-us">
									<a href="tel:+18559071910" class="btn call-animation gnumber"><span class="call-btn-desktop">call us: (855) 907-1910</span><span class="call-btn-mobile">Call us: (855) 907-1910</span></a>
								</div>
								<hr>
								<p>By chatting with HVACprosnearyou.com, you authorize our home service partners or companies to call or text you. They may contact you by live, Homedialed, pre-recorded, or artificial voice call, and/or SMS text, even if your phone number is on any national or state "Do Not Call" list. You are not obligated to make any sort of purchase and standard message and data rates may apply.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		
		<!-- Section Footer Desktop Start -->
		<section id="sticky-footer-desktop">
			<div class="call-req" id="call-req">
				<a href="javascript:void(0);" data-toggle="modal" data-target="#helpServices"><strong>Hi there!</strong> Would you like to receive a free callback in next 60 seconds
				</a>
				<span onclick="callClose()"><i class="fas fa-times"></i></span>
			</div>
			<div class="call-ico">
				<a href="javascript:void(0);" data-toggle="modal" data-target="#helpServices"><i class="fas fa-phone fa-rotate-45"></i></a>
			</div>
		</section>
		<!-- //Section Footer Desktop End -->					

		<!-- Main JS -->
		<script src="assets/js/jquery-3.2.1.min.js"></script> 
		<!-- Bootstrap JS -->
		<script src="assets/js/popper.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script> 
		<!-- All JS Plugins -->
		<!-- Theme JS -->
		<script src="assets/js/theme.js"></script> 
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</body>
</html>