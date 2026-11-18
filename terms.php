
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
		<title>Terms & Condtions || HVAC Pros Near You</title>
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
		<section class="content content-alt" id="privacy">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>Terms & Condition</h2>
						<p>IMPORTANT – THIS IS A LEGAL AGREEMENT BETWEEN YOU (“YOU”) AND HVACprosnearyou.com (“WE”, “HVACprosnearyou.com ”). YOU SHOULD READ CAREFULLY THE FOLLOWING TERMS AND CONDITIONS CONTAINED IN THIS TERMS OF USE AGREEMENT (“AGREEMENT”) AS THEY GOVERN YOUR ACCESS TO AND USE OF THIS WEBSITE, AND OTHER HVACprosnearyou.com WEBSITES AND SERVICES (COLLECTIVELY, THE “WEBSITE”). HVACprosnearyou.com IS WILLING TO LICENSE THE USE OF THE WEBSITE TO YOU ONLY ON THE CONDITION THAT YOU ACCEPT AND AGREE TO ALL OF THE TERMS AND CONDITIONS CONTAINED IN THIS AGREEMENT. NO MEDICAL, PSYCHIATRIC, OR PROFESSIONAL ADVICE.</p><br>
						<p>1. This Website is designed for general educational and information purposes only and does not render medical advice, unless otherwise indicated. The information provided through this Website should not be used for diagnosing or treating a health problem or illness. It is not a substitute for professional health care, and is designed to support – not replace – the relationship you have with your health care provider. If you have or suspect you may have a health problem, you should consult your health care provider.</p><br>
						<p>2. The function of this Website is to provide information regarding certain treatment facilities, and post relevant articles which we think might be helpful to those seeking treatment. Reliance upon any information found on the Websites, any of our licensors, or any affiliates, rests in the user at the user’s own risk. The Website may contain information that you may find explicit or otherwise offensive, erroneous or otherwise inaccurate or outdated.</p><br>
						<h4>3. USER OBLIGATIONS</h4>
						<p>Subject to HVACprosnearyou.com ’s right to monitor or audit compliance, You acknowledge and agree that it is solely your responsibility to maintain your compliance with the terms and conditions of this Agreement. By accessing or using the Website, You also agree to be responsible for and to abide by all applicable local, state, national, and international laws, regulations, rules, and guidelines with respect to your use of the Website. In addition, You agree to assume all responsibility for your use, and the results of your use, of the Website, including meeting any requirements of your contracts with third parties or other persons.</p><br>
						<h4>4. LINKS TO OTHER SITES</h4>
						<p>HVACprosnearyou.com may provide links, in its sole discretion, to other sites from which You can access information and/or purchase services from third parties, including but not limited to rehabilitation centers. HVACprosnearyou.com is not a seller or owner of any goods or services advertised, featured, or otherwise mentioned on these sites. These sites and services have not necessarily been reviewed byHVACprosnearyou.com and are maintained by third parties over which HVACprosnearyou.com exercises no control.</p><br>
						<h4>5. THIRD PARTY SERVICES</h4>
						<p>HVACprosnearyou.com has entered into contractual relationships with certain vendors, sponsors, and advertisers of products or services (“Vendors”), pursuant to which HVACprosnearyou.com may link to or display text, data, photos, graphics and/or video (“Information”), advertisements, discounts, products, goods, or services offered by the third parties. You agree that you must evaluate, and bear all risks associated with, the use of any Vendor-provided Information or services. HVACprosnearyou.com does not guarantee the availability or accuracy of Vendor Information or offers and makes no representations or warranties as to the security or performance of any Vendor Information, offers, or services.</p><br>
						<h4>6. FEEDBACK</h4>
						<p>HVACprosnearyou.com welcomes your feedback and suggestions about HVACprosnearyou.com ’s services or with respect to how to improve the Website. But, by transmitting any feedback or suggestions and any related information, material, or other content (collectively, “feedback”) to HVACprosnearyou.com , You represent and warrant that such feedback does not infringe or violate the intellectual property or proprietary rights of any third party (including, without limitation, patents, copyrights, or trademark rights) and that You have all rights necessary to convey such feedback to HVACprosnearyou.com .</p><br>
						<h4>7. PRIVACY</h4>
						<p>We respect your privacy and the use and protection of your personally identifiable information. Please see our Privacy Policy for important information and disclosures relating to the collection and use of your personally identifiable information in connection with your use of the Website.</p><br>
						<h4>8. TERMINATION</h4>
						<p>HVACprosnearyou.com also reserves the right at any time and on reasonable grounds, which shall include, without limitation, any reasonable belief of fraud, illegal activity, or actions or omissions that violate any term or condition of this Agreement, to terminate this Agreement with You (including any registered account) in order to protect its name, business, or goodwill and/or any other user. You acknowledge and agree that HVACprosnearyou.com shall have the sole right to determine in its reasonable discretion whether You are engaging in any unauthorized activity and/or violating any term or conditions of this Agreement.</p><br>
						<h4>9. MISCELLANEOUS</h4>
						<p>The relationship between You and HVACprosnearyou.com is and shall be that of independent contractors and nothing in this Agreement shall be construed or used to create or imply any relationship of partners, joint venturers, or employer and employee. You may not assign or otherwise transfer this Agreement or the license granted hereunder or delegate any of your duties specified herein, in whole or in part, without HVACprosnearyou.com ’s prior written consent.</p><br>
					</div>
				</div>
			</div>
		</section>
		<!-- //Section Privacy End -->		

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