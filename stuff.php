<?php
include "connect.php";
session_start();
include "ifSession.php";
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>BAZcanteen</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" type="image/png" href="images/bazlogo.png"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/BAZANDPOORT.png" alt="" class="bazlogo"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation" onclick="loguit()">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item active" href="stuff.php">Credits</a>
                                <a class="dropdown-item" href="gallery.php">Gallery</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Shopping cart <i style="font-size:20px" class="fa">&#xf07a;</i></a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="account/account.php">Account</a></li>
                    </ul>
                </div>
            </div>
            <li class="nav-item"><a class="nav-link" href="loguit.php" id="logout">Logout</a></li>
        </nav>
    </header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Credits</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Stuff -->
	<div class="stuff-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Credits</h2>
						<p>These are the people responsible for creating the site.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="our-team">
						<img src="images/GerritWijns.jpg">
						<div class="team-content">
							<h3 class="title">Gerrit Wijns</h3>
							<span class="post">Owner</span>
							<ul class="social">
								<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6">
					<div class="our-team">
						<img src="images/RubenMoons.jpg">
						<div class="team-content">
							<h3 class="title">Ruben Moons</h3>
							<span class="post">Web Designer / Creator</span>
							<ul class="social">
								<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6">
					<div class="our-team">
						<img src="images/zandpoort.jpg">
						<div class="team-content">
							<h3 class="title">Busleyden Atheneum Zandpoort</h3>
							<span class="post">School</span>
							<ul class="social">
								<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Stuff -->
	
	<!-- Start Customer Reviews -->
    <?php include "customerreviews.php";?>
	<!-- End Customer Reviews -->

    <?php include "footer.php";?>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
    <script src="js/navbar.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>