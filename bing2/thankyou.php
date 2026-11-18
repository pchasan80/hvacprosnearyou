
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home || HVACPros Near You </title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <style>
        #main article {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100vh;
            padding: 10rem 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #main article section {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            position: relative;
            /* text-align: center; */
        }
        .overlay {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: .6;
            position: absolute;
            pointer-events: none;
            background-color: #000a2b;
        }
        #main .main-banner {
            background: url(../assets/images/banner.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        #main .main-banner .heading{
            margin: 0;
            color: #fff;
            font: 700 48px/60px "Ubuntu", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        #main .divider {
            padding: 0;
            margin: 0;
            color: #fff;
        }
        #main .title{
            color: #fff;
            font-size: 1.2rem;
            margin: 0;
        }
        #main .shortTitle{
            color: #fff;
            font-size: 1rem;
            margin: 0;
        }
        #main .shortDescription{
            color: #fff;
            font-size: 1rem;
            margin: 0;
        }
        .call-us{
            margin: 3rem 0;
        }
        h1 {
            font-size: 40px;
            font-weight: 600;
            padding-bottom: 20px;
            margin: 0;
            color: #fff;
            line-height: 1.2;
        }
        a:hover{
            text-decoration: none;
        }
        ul{
            list-style: none;
            padding: 0;
        }
        ul li{
            display: flex;
            align-items: center;
            color: #fff;
            font-size: 25px;
            padding: 10px 0;
        }
        .serviceList{
            display: flex;
            justify-content: space-between;
            padding-top: 30px;
        }
        .serviceList .item i {
            display: block;
            font-size: 30px;
            margin-right: 10px;
            position: relative;
            z-index: 1;
        }
        .serviceList .item i::after {
            position: absolute;
            height: 100%;
            width: 100%;
            left: 50%;
            content: "";
            z-index: -1;
            opacity: 0.1;
        }
        .main-banner img{
            width: 30%;
            height: auto;
        }
        @media (max-width: 992px) {
            #main .main-banner .heading {
                font-size: 33px;
                line-height: 40px;
            }
            #main article{
                padding: 1rem;
                overflow-y: scroll;
            }
            .call-us{
                margin: 1.5rem 0;
            }
            h1 {
                font-size: 30px;
            }
            .serviceList{
                flex-direction: column;
            }
            ul li{
                font-size: 18px;
            }
            .serviceList .item i {
                font-size: 30px;
            }
        }
        @media (max-width: 767px) {
            #main .main-banner .heading {
                font-size: 30px;
                line-height: 37px;
            }
            #main article{
                padding: 1rem;
            }
            .call-us{
                margin: 1.5rem 0;
            }
            h1 {
                font-size: 22px;
                line-height: 1.5;
            }
            .serviceList{
                flex-direction: column;
            }
            ul li{
                font-size: 18px;
            }
            .serviceList .item i {
                font-size: 22px;
                line-height: 1.5;
            }
        }
        .review{
            text-align: center;
            padding-bottom: 20px;
        }
        .review span{
            color: #fff;
        }
        .review i {
            font-size: 15px;
            padding: 5px;
        }
        .fa-star:before {
            content: "\f005";
            color: #76c507;
        }
        .call-us a {
            color: #fff;
            border: 1px solid #ff001a;
            background-color: #ff001a;
        }

        .blinkEffect {
            color: #fff;
            animation: blink 3.5s infinite linear forwards;
        }
        @keyframes blink {
            0% {
                color: transparent;
            }
            50% {
                color: #fff;
            }
            100% {
                color: transparent;
            }
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Ads: 10787698940  -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10787698940 "></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "AW-10787698940 ");
    </script>
    <!-- End Global site tag (gtag.js) - Google Ads: 10787698940  -->
    <!-- Google Call Tracking Snippet -->
    <script type="text/javascript">
        var callback = function (formatted_number, mobile_number) {
            // formatted_number: number to display,in the same format as
            // 'phone_conversion_number'.
            // (in this case, '(888) 963-2543')
            // mobile_number: number formatted for use in a clickable link
            // with tel:-URI (in this case, '18889632543')
            var x = document.querySelectorAll(".gnumber");
            var i;
            for (i = 0; i < x.length; i++) {
            x[i].innerHTML = formatted_number;
            x[i].href = "tel:" + mobile_number.replace("+", "+1");
            }
        };
        gtag("config", "AW-10787698940/Jzq1CLqTr9EDEPzx_Jco", {
            phone_conversion_number: "(888) 963-2543",
            phone_conversion_callback: callback,
            phone_conversion_options: {
            cache: false,
            },
        });
    </script>
    <!-- End Google Call Tracking Snippet -->
</head>
<body>
    <div id="main">
        <article class="main-banner">
            <span class="overlay"></span>
            <section>
                <div>
                    <div class="review">
                        <i class="fas fa-star"></i>
                        <span>TrustScore 9.2 | 1279 reviews</span>
                    </div>
                    <h1 class="mobileNone text-center">We will match you with the top HVAC <br/> contractor in your area </h1>
                    <h1 class="desktopNone text-center">We will match you with the top HVAC contractorin your area 
                    </h1>
                    <p class="title text-center">24/7 Emergency Service, No Hidden Fees, No Overtime Fees, Free Estimates</p>
                    <!-- <div class="serviceList">
                        <ul>
                            <li class="item itemOne"><i class="fa fa-headphones"></i> 24/7 Emergency Service</li>
                            <li class="item itemTwo"><i class="fa-solid fa-hand-holding-dollar"></i> No Hidden Fees</li>
                        </ul>
                        <ul>
                            <li class="item itemThree"><i class="fa-regular fa-calendar-days"></i> No Overtime Fees</li>
                            <li class="item itemFour"><i class="fas fa-chart-line"></i> Free Estimates</li>
                        </ul>
                    </div> -->
                    <div class="call-us">
                        <a href="tel:+18889632543" class="mobileNone gnumber blinkEffect">
                            <span class="call-btn-desktop">
                                Call us: (888) 963-2543
                            </span>
                        </a>
                        <a href="tel:+18889632543" class="desktopNone gnumber blinkEffect" onclick="uet_report_conversion();">
                            <span class="call-btn-mobile">
                                Call us: (888) 963-2543
                            </span>
                        </a>
                    </div>
                    <p class="shortTitle text-center">One call can help solve it all!</p>
                </div>
                <!-- <img class="img-fluid mobileNone" src="https://validthemes.net/site-template/dostart/assets/img/illustration/7.png" alt="Thumb"> -->
            </section>
        </article>
    </div>
    <!-- Main JS -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- All JS Plugins -->
    <!-- Theme JS -->
    <script src="../assets/js/theme.js"></script>
    <script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"187087496", enableAutoSpaTracking: true};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
    <script>window.uetq = window.uetq || [];window.uetq.push('event', 'page_view', {});</script>
</body>
</html>