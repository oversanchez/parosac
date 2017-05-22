<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themeregion.com/castle/foodcastle/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2017 15:51:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--title-->
    <title>Parosac</title>

    <!--CSS-->
    <link href="/food_castle/css/bootstrap.min.css" rel="stylesheet">
    <link href="/food_castle/css/font-awesome.min.css" rel="stylesheet">
    <link href="/food_castle/css/animation.css" rel="stylesheet">
    <link href="/food_castle/css/magnific-popup.css" rel="stylesheet">
    <link href="/food_castle/css/date-picker.css" rel="stylesheet">
    <link href="/food_castle/css/bxslider.css" rel="stylesheet">
    <link href="/food_castle/css/vegas.min.css" rel="stylesheet">
    <link href="/food_castle/css/main.css" rel="stylesheet">
    <link href="/food_castle/css/responsive.css" rel="stylesheet">

    <!--Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,800,100,600' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="/food_castle/js/html5shiv.js"></script>
    <script src="/food_castle/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/food_castle/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/food_castle/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/food_castle/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/food_castle/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/food_castle/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body style="overflow: hidden;">
<div id="home-wrapper" >
    <div id="bg-video-section" >
        <div class="overlay-bg"></div>
        <div class="container">
            <div class="main-slider">
                <div class="slider-content text-center" style="margin-top:-295px;">
                    <div class="slider-logo">
                        <img class="img-responsive" src="/food_castle/images/slider-logo.png" alt="" >
                    </div>
                    <h1><span class="pacifico" style="color:rgb(164, 201, 88);">Bienvenidos a</h1>
                    <div class="slider-logo">
                        <img class="img-responsive" style="width: 250px;" src="http://parosac.com/wp-content/uploads/logo-parosac.png" alt=""/>
                    </div>
                    <h2 style="color: #d65b21;">Buena comida, La mejor</h2>
                    <a href="/mantenimientos/cliente" class="btn btn-primary">Entrar como cliente</a>
                    <a href="/mantenimientos/servir" class="btn btn-primary">Servir</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/#scripts-->
<script type="text/javascript" src="/food_castle/js/jquery.js"></script>
<script type="text/javascript" src="/food_castle/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/food_castle/js/jquery.parallax.js"></script>
<script type="text/javascript" src="/food_castle/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/food_castle/js/vegas.min.js"></script>
<script type="text/javascript" src="/food_castle/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/food_castle/js/swfobject.js"></script>
<script type="text/javascript" src="/food_castle/js/modernizr.video.js"></script>
<script type="text/javascript" src="/food_castle/js/video_background.js"></script>
<script type="text/javascript" src="/food_castle/js/main.js"></script>
<script type="text/javascript" src="/food_castle/js/bootstrap-datepicker.js"></script>
<script>$('input.date-pick').datepicker();</script>
<script>
    $(document).ready(function ($) {
        var Video_back = new video_background($("#bg-video-section"), {
            "position": "absolute",	//Follow page scroll
            "z-index": "-1",		//Behind everything
            "loop": true, 			//Loop when it reaches the end
            "autoplay": true,		//Autoplay at start
            "muted": true,			//Muted at start
            "mp4": "/food_castle/video/food.mp4", 	//Path to video mp4 format
            "video_ratio": 1.7778, 				// width/height -> If none provided sizing of the video is set to adjust
            "priority": "html5"				//Priority for html5 (if set to flash and tested locally will give a flash security error)
        });
    });
</script>
</body>
</html>