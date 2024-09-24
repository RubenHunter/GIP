<?php
include "../connect.php";
session_start();
$sql = "SELECT * FROM tblgebruikers WHERE volgnummer='" . $_SESSION["gebruiker"]["volgnummer"] . "'";
$resultaat = $mysqli->query($sql);
$account = $resultaat->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>BAZcanteen Cancel Order</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <link rel="stylesheet" href="thankyou.css">

</head>
<body>
<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/BAZANDPOORT.png" alt="" class="bazlogo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation"
                    onclick="loguit()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="../about.php">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="../stuff.php">Stuff</a>
                            <a class="dropdown-item" href="../gallery.php">Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../cart.php">Shopping cart <i style="font-size:20px"
                                                                                                 class="fa">&#xf07a;</i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="../account/account.php">Account</a></li>
                </ul>
            </div>
        </div>
        <li class="nav-item"><a class="nav-link" href="../loguit.php" id="logout">Logout</a></li>
    </nav>
</header>
<!-- End header -->

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Canceled Order</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12" style="text-align: center">
            <!--<h1 style="text-align: center">The mail has been send, open your <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">gmail</a></h1>-->
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10"
                        cx="65.1" cy="65.1" r="62.1"/>
                <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round"
                      stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round"
                      stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
            </svg>
            <p class="error">Bummer!</p>
            <h2>We're sorry to hear you canceled your order. If you change your mind go to your cart here</h2>
            <div class="inner-column"><a class="btn btn-lg btn-circle btn-outline-new-white" href="../cart.php"
                                         style="margin-bottom: 20px; margin-top: 20px;">Go to cart</a></div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
<!-- End Footer -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="../js/navbar.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->

<script src="../js/jquery.superslides.min.js"></script>
<script src="../js/images-loded.min.js"></script>
<script src="../js/isotope.min.js"></script>
<script src="../js/baguetteBox.min.js"></script>
</body>
</html>