
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
		<title>About Us || HVACPros Near You </title>
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
		</style>


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


		<!-- Section Privacy Start -->
		<section id="privacy" class="content content-alt">
			<div class="container">
				
				<div class="row">

				<div class="col-md-12">

				<h2>ABOUT HVACprosnearyou.com</h2>

				<br><h4>Committed to Affordable HVAC Solutions</h4>
				
				<p>We are a local HVAC service provider that strives for 100% customer satisfaction in everything we do. Our service offerings are everything HVAC. That includes air conditioning, heating, ventilation, air filtration system repair, maintenance, installation, and replacement.</p>

				<p>Our mission is to make HVAC system repair both accessible and affordable. We accomplish this by providing 24/7 same day service and flexible financing options for those who need Heating or AC replacement in USA. In addition, we have several service trucks running throughout our service areas.</p>

				<p>HVACPros is more than just a "warranty", it's peace of mind. Good Sam covers a myriad of extended service plans for new and used RVs, motorhomes, travel trailers, and automobiles, trucks and SUVs.</p>

				<p>We offer options and are better than warranties.</p>
				<br>
				<h4>Heating and Cooling Done Right!</h4>
				<br>
				<p>HVACPros HVAC is a full service heating and AC repair, maintenance, and installation company dedicated to serving our clients with the best possible solutions for heating and cooling in USA.</p>

				<p>We are truly passionate about the effort we put into our HVAC services every day, and are proud of the results. Being an honest, ethical, and friendly HVAC company in Houston is who we are! Learn what our customers have to say about our professionalism and reliability.</p>

					
				</div>
				</div>

			</div>
		</section><!-- //Section Privacy End -->		


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
		<section class="content" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<p>&copy; HVACprosnearyou.com. All rights reserved</p>
					</div>
					<div class="col-md-8">
						<div class="d-block float-right">
							<a href="about-us.php">&nbsp;About Us |</a> 
							<a href="contact-us.php">Contact Us |</a> 
							<a href="privacy.php">&nbsp;Privacy Policy |</a> 
							<a href="terms.php">Terms and Condition</a>
						</div>
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
	</body>
</html>