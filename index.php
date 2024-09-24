<?php
include "connect.php";
session_start();

include "ifSession.php";
$sql = "SELECT * FROM tblgebruikers WHERE volgnummer='" . $_SESSION["gebruiker"]["volgnummer"] . "'";
$resultaat = $mysqli->query($sql);
$account = $resultaat->fetch_assoc();
include "todayDate.php";
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<!--TEMPLATE: https://www.free-css.com/free-css-templates/page249/yamifood-->
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

    <!--als je internet explorer gebruikt-->
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation"
                    onclick="loguit()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="stuff.php">Credits</a>
                            <a class="dropdown-item" href="gallery.php">Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Shopping cart <i style="font-size:20px"
                                                                                              class="fa">&#xf07a;</i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="account/account.php">Account</a></li>
                </ul>
            </div>
        </div>
        <li class="nav-item"><a class="nav-link" href="loguit.php" id="logout">Logout</a></li>
    </nav>
</header>
<!-- End header -->

<!-- Start slides -->
<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="images/slider-01.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> BAZcanteen</strong></h1>
                        <p class="m-b-40">Here on our site you can order your favourite food and if you can't find <br>
                            it send us a request to get it on our menu!</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="cart.php">My shopping cart</a>
                        </p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="images/slider-02.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> BAZcanteen</strong></h1>
                        <p class="m-b-40">Here on our site you can order your favourite food and if you can't find <br>
                            it send us a request to get it on our menu!</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="cart.php">My shopping cart</a>
                        </p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="images/slider-03.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> BAZcanteen</strong></h1>
                        <p class="m-b-40">Here on our site you can order your favourite food and if you can't find <br>
                            it send us a request to get it on our menu!</p>
                        <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="cart.php">My shopping cart</a>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->

<!-- Start About -->
<div class="about-section-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="images/about-img.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                <div class="inner-column">
                    <h1>Welcome To <span>Busleyden Atheneum Zandpoort canteen</span></h1>
                    <h4>Little Story</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut
                        at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante
                        sodales augue, eget lacinia lectus erat et sem. </p>
                    <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a
                        pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem
                        pulvinar.</p>
                    <a class="btn btn-lg btn-circle btn-outline-new-white" href="menu.php">Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About -->

<!-- Start QT -->
<?php include "QT.php"; ?>
<!-- End QT -->

<!-- Start Menu -->
<div class="text-center" style="margin-top: 25px;">
    <h2 style="font-size: 28px;"><b>Menu</b></h2>
</div>
<?php include "menuOfDay.php"; ?>
<!-- End Menu -->

<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Gallery</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-01.jpg">
                        <img class="img-fluid" src="images/gallery-img-01.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-02.jpg">
                        <img class="img-fluid" src="images/gallery-img-02.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-03.jpg">
                        <img class="img-fluid" src="images/gallery-img-03.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-04.jpg">
                        <img class="img-fluid" src="images/gallery-img-04.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-05.jpg">
                        <img class="img-fluid" src="images/gallery-img-05.jpg" alt="Gallery Images">
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <a class="lightbox" href="images/gallery-img-06.jpg">
                        <img class="img-fluid" src="images/gallery-img-06.jpg" alt="Gallery Images">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->

<!-- Start Customer Reviews -->
<?php include "customerreviews.php"; ?>
<!-- End Customer Reviews -->

<?php include "footer.php"; ?>

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