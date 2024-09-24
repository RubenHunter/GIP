<?php
include "../connect.php";
session_start();
if (!isset($_SESSION["gebruiker"])) {
    header("location:../login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
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
<div>
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
                    <h1>User List</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End header -->
    <?php
    $admin = 0;
    $sql = "select * from tblgebruikers WHERE admin ='" . $admin . "'";
    $resultaat = $mysqli->query($sql);
    echo "<div class='container'>";
    echo "<table class='table'>";
    print "<div class='row'><tr><td>NR.</td><td>NAME</td><td>FORNAME</td></div><div class='row'><td>EMAIL</td><td>PHONENUMBER</td></tr></div>";
    while ($row = $resultaat->fetch_assoc()) {
        echo "<div class='row'><tr><td>" . $row['volgnummer'] . "  </td><td>" . $row['naam'] . "  </td><td>  " . $row['voornaam'] . "  </td></div><div class='row'><td>  " . $row['email'] .
            " </td><td>" . $row['gsmnummer'] . "</td></div><td><a href=wis.php?tewissen=" . $row['volgnummer'] . "><div class='delete'>Delete</div></a></td><td><a href=wijzig.php?tewijzigen=" . $row["volgnummer"] . "><div class='change'>Change</div></a></td></tr>";
    }
    print "</div>
</table>";
    ?>
</div>

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
