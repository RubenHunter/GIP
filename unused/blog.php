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
    <title>BAZcanteen blog</title>
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
                                <a class="dropdown-item active" href="blog.php">Blog</a>
                                <a class="dropdown-item" href="stuff.php">Credits</a>
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
					<h1>Blog</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start blog -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Blog</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-01.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-02.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-03.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-04.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-05.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-06.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-07.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-08.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="blog-box-inner">
						<div class="blog-img-box">
							<img class="img-fluid" src="images/blog-img-09.jpg" alt="">
						</div>
						<div class="blog-detail">
							<h4>Duis feugiat neque sed dolor cursus.</h4>
							<ul>
								<li><span>Post by Admin</span></li>
								<li>|</li>
								<li><span>27 February 2018</span></li>
							</ul>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
							<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
							<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End blog -->

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