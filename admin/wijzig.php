<!DOCTYPE html>
<html>
<head>
    <title>Change userinfo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <link rel="stylesheet" href="css/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../images/BAZANDPOORT.png" alt="" class="bazlogo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation"
                    onclick="loguit()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">ADMINPANEL</a></li>
                    <li class="nav-item active"><a class="nav-link" href="gebruikers.php">AllUsers</a></li>
                    <li class="nav-item"><a class="nav-link" href="product.php">AddProduct</a></li>
                    <li class="nav-item"><a class="nav-link" href="lijstproducten.php">ProductList</a></li>

                    <li class="nav-item"><a class="nav-link" href="menuLijst.php">MenuList</a></li>
                    <li class="nav-item"><a class="nav-link" href="orders.php">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="reclame.php">Advertisements</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.php">GoToSite</a></li>
                </ul>
            </div>
        </div>
        <li class="nav-item"><a class="nav-link" href="loguit.php" id="logout">Logout</a></li>
    </nav>
</header>
<!-- End header -->
<!-- Start header -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Change</h1>
            </div>
        </div>
    </div>
</div>
<!-- End header -->

<?php
include "../connect.php";
session_start();
if (!isset($_SESSION["gebruiker"])) {
    header("location:../login");
}
if (isset($_POST['wijzig'])) {
    $volgnummer = $_POST["volgnummer"];
    $naam = $_POST["naam"];
    $voornaam = $_POST["voornaam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    $gsmnummer = $_POST["gsmnummer"];
    if ($gsmnummer = " ") {
        $gsmnummer = 0;
    }
    $mdWachtwoord = md5($wachtwoord);
    $admin = $_POST["admin"];
    //$profielfoto = $_POST["profielfoto"];
    $sql = "UPDATE tblgebruikers  SET naam= '" . $naam . "', voornaam = '" . $voornaam . "', email= '" . $email . "', wachtwoord = '" . $mdWachtwoord . "', gsmnummer= '" . $gsmnummer . "', admin= '" . $admin . "' where volgnummer= '" . $volgnummer . "'";

    if ($mysqli->query($sql)) {
        echo "Record successfully changed";
    } else {
        echo "Error changing record: " . $mysqli->error;
    }
    $mysqli->close();
    print "<br><a href='gebruikers.php'>
<div class='link'>
Back to user list
</div>
</a>";

} else {
    $sql = "select * from tblgebruikers where volgnummer= '" . $_GET["tewijzigen"] . "'";
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();
    print "<form action='wijzig.php' method='post' id='productForm'>";
    print "<table class='table notTable'>";

    print "<tr><td>Serial number      </td><td>" . $row["volgnummer"] . "<input type='hidden' name='volgnummer' value=" . $row["volgnummer"] . "></td></tr>";

    print "<tr><td>Name            </td><td><input type='text' name='naam' value=" . $row["naam"] . "></td></tr>";
    print "<tr><td>First name        </td><td><input type='text' name='voornaam' value=" . $row["voornaam"] . "></td></tr>";
    print "<tr><td>Email           </td><td><input type='email' name='email' value=" . $row["email"] . "></td></tr>";
    print "<tr><td>Password      </td><td><input type='text' name='wachtwoord' placeholder='*****'></td></tr>";
    print "<tr><td>Phonenumber      </td><td><input type='number' name='gsmnummer' value=" . $row["gsmnummer"] . "></td></tr>";
    print "<tr><td>Admin           </td><td><input type='number' min='0' max='1' name='admin' value=" . $row["admin"] . "></td></tr>";
    //print "<tr><td>Profielfoto     </td><td><input type='image' name='profielfoto' src=".$row["profielfoto"]." alt='none'></td></tr>";
    print "<tr><td><input type='submit' name='wijzig' value='Change' class='change'></td></tr>";


    print "</table>";
    print "</form>";
    print "<a href='gebruikers.php'>
<div class='link'>
Go back to user list
</div>
</a>";
}
?>
<div class="inner-column">
    <a class="btn btn-lg btn-circle btn-outline-new-white" href="index.php">
        Go back to ADMIN PANEL
    </a>
</div>

<?php include "../footer.php"; ?>

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
<script src="../js/custom.js"></script>
</body>
</html>
