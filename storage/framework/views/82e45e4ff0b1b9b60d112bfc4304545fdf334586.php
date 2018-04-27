<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Guardian</title>
    <meta name="author" content="" />
    <meta name="keywords" content="404 page, guardian, css3, template, html5 template" />
    <meta name="description" content="404 - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <style>
    	body{
    		background-color: #373740;
    	}
    	.info {	position: relative;	z-index: 999;}
    	.info h1 {	font-size: 102px;	font-weight: 700;	margin-top: 120px;	line-height: 105px;	color: #f4ffa5;text-transform: uppercase;}
    	.info h2 {	font-size: 42px;	font-weight: 700;	line-height: 48px;	color: #ffffff;	text-transform: uppercase;}
    	.info p {	font-size: 16px;	line-height: 24px;	font-weight: 200;	color: #ffffff;	margin: 15px 0;}
    	.guardian {	margin-top: 100px; }
    	.btn.focus, .btn:focus, .btn:hover {	color: #333;	text-decoration: none;}
    	.btn {
			font-size: 18px;
			font-weight: 600;
			color: #ffffff;
			border: 0px solid;
			border-bottom: 2px solid;
			border-color: #b1533e;
			padding: 10px 41px;
			border-radius: 5px;
			background: none;
			text-transform: uppercase;
			display: inline-block;
			margin: 20px 20px 0 0;
			background-color: #e56e54;
			-webkit-transition: all 0.5s ease-in-out;
			-moz-transition: all 0.5s ease-in-out;
			-ms-transition: all 0.5s ease-in-out;
			-o-transition: all 0.5s ease-in-out;
			transition: all 0.5s ease-in-out;
			text-decoration: none;
			cursor: pointer;
		}
		.btn.active.focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn:active:focus, .btn:focus {
	outline: thin dotted;
	outline: 5px auto -webkit-focus-ring-color;
	outline-offset: -2px;
}
.btn:hover {
	background: #b1533e;
	color: #ffffff;
	text-decoration: none;
}
		.btn-light-blue {
	border-color: #6b4b41;
	background-color: #845e52;
}
	</style>

</head>
<body>
<!-- Load page -->
    <div class="animationload">
        <div class="loader">
        </div>
    </div>
    <!-- End load page -->


    <!-- Content Wrapper -->
    <div id="wrapper">
        <div class="container">
            <div class="col-xs-12 col-sm-7 col-lg-7">
                <!-- Info -->
                <div class="info">
                    <h1>Sorry!</h1>
                    <h2>but i can't do it</h2>
                    <p>The page you are looking for was moved, removed,
                        renamed or might never existed.</p>
                    <a href="<?php echo e(url('/')); ?>" class="btn">Go Home</a>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-light-blue">Contact Us</a>
                </div>
                <!-- end Info -->
            </div>

            <div class="col-xs-12 col-sm-5 col-lg-5 text-center">
                <!-- Guardian -->
                <div class="guardian">
                    <img src="<?php echo e(asset('images/guardian.gif')); ?>" alt="Guardian" />
                </div>
                <!-- end Guardian -->
            </div>

        </div>
        <!-- end container -->
    </div>
    <!-- end Content Wrapper -->
	</body>
</html>
