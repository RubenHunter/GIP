<?php
include "../connect.php";
session_start();
$sql = "SELECT * FROM tblgebruikers WHERE volgnummer='" . $_SESSION["gebruiker"]["volgnummer"] . "'";
$resultaat = $mysqli->query($sql);
$account = $resultaat->fetch_assoc();

$prijs = 0;
$sql2 = "SELECT * FROM tblorderinhoud WHERE orderId = '" . $_SESSION["orderId"] . "'";
$resultaat2 = $mysqli->query($sql2);
while ($row2 = $resultaat2->fetch_assoc()) {
    $sql3 = "SELECT * FROM tblproduct WHERE id= '" . $row2["productId"] . "'";
    $resultaat3 = $mysqli->query($sql3);
    $row3 = $resultaat3->fetch_assoc();
    $prijs = $prijs + ($row3["prijs"] * $row2["quantiteit"]);
}

$mail = $account["email"];

$headers = 'From: bazcantine@gmail.com' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=utf-8';

//random code aanmaken

$subject = "Happy news: order confirmed! 🥳, OrderID='" . $_SESSION["orderId"] . "' receipt";

$body = "This is proof of your purchase on " . $_SESSION["cartDate"] . "\n<br>
        Total: €" . $prijs . "\n<br>
        Your order:\n<br>
        ";
$sql2 = "SELECT * FROM tblorderinhoud WHERE orderId = '" . $_SESSION["orderId"] . "'";
$resultaat2 = $mysqli->query($sql2);
while ($row2 = $resultaat2->fetch_assoc()) {
    $sql3 = "SELECT * FROM tblproduct WHERE id= '" . $row2["productId"] . "'";
    $resultaat3 = $mysqli->query($sql3);
    $row3 = $resultaat3->fetch_assoc();
    $body = $body . "x" . $row2["quantiteit"] . " " . $row3["naamproduct"] . "\n<br>";

}
$body = $body . "Bought on " . $_SESSION["cartDate"] . " with pickup at: " . $_SESSION["cartTime"];

$result = mail($mail, $subject, $body, $headers);
//var_dump($result);


/**
 * Created by PhpStorm.
 * User: ruben.moons
 * Date: 14/01/2022
 * Time: 14:33
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank you</title>
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
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
                <h1>Thank you</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12" style="text-align: center">
            <!--<h1 style="text-align: center">The mail has been send, open your <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">gmail</a></h1>-->
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
            <h2>An email receipt has been sent to your email.</h2>
            <div class="inner-column"><a target="_blank" class="btn btn-lg btn-circle btn-outline-new-white"
                                         href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"
                                         style="margin-bottom: 20px; margin-top: 20px;">Go to your gmail here</a></div>
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
