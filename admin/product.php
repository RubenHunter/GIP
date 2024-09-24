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
    <title>Add product</title>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation" onclick="loguit()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">ADMINPANEL</a></li>
                    <li class="nav-item"><a class="nav-link" href="gebruikers.php">AllUsers</a></li>
                    <li class="nav-item active"><a class="nav-link" href="product.php">AddProduct</a></li>
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
                <h1>Add Product</h1>
            </div>
        </div>
    </div>
</div>
<!-- End header -->
<?php
if (isset($_POST["post"])){
    $productnaam = $_POST["productnaam"];
    $descriptie = $_POST["descriptie"];
    $prijs = $_POST["prijs"];
    $sectie = $_POST["sectie"];

    $sql = "INSERT INTO tblproduct(naamproduct, descriptie, prijs, sectie) VALUES ('".$productnaam."', '".$descriptie."', '".$prijs."', '".$sectie."') ";
    print $sql;
    if ($mysqli->query($sql)){
        print "succesfully added";
    }else{
        print "Something went wrong";
        print $sql;
    }
}
?>
<form action="product.php" method="post" id="productForm">
    <table class="table notTable">
        <tr><td><label for="productnaam">Product name</label></td>
        <td><input type="text" name="productnaam" id="productnaam" class="inputs" autocomplete="off" required></td></tr>
        <tr><td><label for="descriptie">description</label></td>
            <td><textarea name="descriptie" id="descriptie" rows="2" cols="30" class="inputs"></textarea></td></tr>
        <!--<input type="text" name="descriptie" id="descriptie" style="height: 100px;" required>-->
        <tr><td><label for="prijs">Price</label></td>
            <td><input type="number" name="prijs" id="prijs" step="1" min="0" max="100" class="inputs" required></td></tr>
        <tr><td><label>section</label></td>
        <td><select id="sectie" name="sectie" class="inputs" required>
                <option value="drinks" >drinks</option>
                <option value="lunch">lunch</option>
                <option value="dinner">dinner</option>
                <option value="desert">dessert</option>
            </select></td></tr>
    </table>
    <input type="submit" name="post" value="Add" class="change">
</form>

<div class="inner-column">
    <a class="btn btn-lg btn-circle btn-outline-new-white" href="index.php">
        Go back to ADMIN PANEL
    </a>
</div>

<?php include "../footer.php";?>

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
