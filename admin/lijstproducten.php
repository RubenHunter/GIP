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
    <title>Product list</title>
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
                    <li class="nav-item"><a class="nav-link" href="gebruikers.php">AllUsers</a></li>
                    <li class="nav-item"><a class="nav-link" href="product.php">AddProduct</a></li>
                    <li class="nav-item active"><a class="nav-link" href="lijstproducten.php">ProductList</a></li>

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
                <h1>Product List</h1>
            </div>
        </div>
    </div>
</div>
<!-- End header -->
<?php
$sql = "select * from tblproduct";
$resultaat = $mysqli->query($sql);
print "<table class='table'>";
print "<tr><td>ID</td><td>NAME</td><td>DESCRIPTION</td><td>PRICE</td><td>CATEGORY</td><td>PICTURE</td></tr>";
while ($row = $resultaat->fetch_assoc()) {
    print "<tr><td>" . $row["id"] . "</td><td>" . $row["naamproduct"] . "</td><td>" . $row["descriptie"] . "</td><td>" . $row["prijs"] . "</td><td>" . $row["sectie"] . "</td><td>" . $row["foto"] . "</td><td><a href=wisproduct.php?tewissen=" . $row["id"] . "><div class='delete'>Delete</div></a></td><td><a href=wijzigproduct.php?tewijzigen=" . $row["id"] . "><div class='change'>Change</div></a></td><td><a href=foto.php?teveranderen=" . $row["id"] . "><div class='addpic'>AddPic</div></a></td><td><a href=maakMenu.php?toetevoegen=" . $row["id"] . "><div class='addmenu'>AddMenu</div></a></td></tr>";
}
print "</table>";
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
