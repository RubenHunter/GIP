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
    <title>Change product</title>
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
                <h1>Change Product</h1>
            </div>
        </div>
    </div>
</div>
<!-- End header -->
<?php
if (isset($_POST['wijzig'])) {
    $id = $_POST["id"];
    $naamproduct = $_POST["naamproduct"];
    $descriptie = $_POST["descriptie"];
    $prijs = $_POST["prijs"];
    $sectie = $_POST["sectie"];
    //$profielfoto = $_POST["profielfoto"];
    $sql = "UPDATE tblproduct  SET naamproduct= '" . $naamproduct . "', descriptie = '" . $descriptie . "', prijs= '" . $prijs . "', sectie = '" . $sectie . "' where id= '" . $id . "'";

    if ($mysqli->query($sql)) {
        echo "Record succesfully modded";
    } else {
        echo "Error changing record: " . $mysqli->error;
    }
    $mysqli->close();


} else {
    $sql = "select * from tblproduct where id= '" . $_GET["tewijzigen"] . "'";
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();

    print "<form action='wijzigproduct.php' method='post' id='productForm'>";
    print "<table class='table'>";
    print "<tr><td>ID      </td><td>" . $row["id"] . "<input type='hidden' name='id' value=" . $row["id"] . "></td></tr>";

    print "<tr><td>Productname     </td><td><input type='text' name='naamproduct' value=" . $row["naamproduct"] . "></td></tr>";
    print "<tr><td>Description         </td><td><textarea name='descriptie' cols='30' rows='2' >" . $row["descriptie"] . "</textarea></td></tr>";
    print "<tr><td>Price            </td><td><input type='number' name='prijs' step='1' min='0' max='100' value=" . $row["prijs"] . "></td></tr>";
    print "<tr><td>Category          </td><td><select name='sectie' id='sectie'>
                                                <option value='drinks'>drinks</option>
                                                <option value='lunch'>lunch</option>
                                                <option value='dinner'>dinner</option>
                                                <option value='desert'>dessert</option>
                                            </select></td></tr>";
    print "</table>";
    print "<input type='submit' name='wijzig' class='change' value='Change'>";
    print "</form>";
    switch ($row["sectie"]) {
        case "drinks":
            print "<script type='text/javascript'>
var select = document.getElementById('sectie');
var option;
for (var i = 0; i < select.options.length; i++){
    option = select.options[i];
    if (option.text === 'drinks'){
        option.setAttribute('selected', true);
    }
}
</script>";
            break;
        case "lunch":
            print "<script type='text/javascript'>
var select = document.getElementById('sectie');
var option;
for (var i = 0; i < select.options.length; i++){
    option = select.options[i];
    if (option.text === 'lunch'){
        option.setAttribute('selected', true);
    }
}
</script>";
            break;
        case "dinner":
            print "<script type='text/javascript'>
var select = document.getElementById('sectie');
var option;
for (var i = 0; i < select.options.length; i++){
    option = select.options[i];
    if (option.text === 'dinner'){
        option.setAttribute('selected', true);
    }
}
</script>";
            break;
        case "desert":
            print "<script type='text/javascript'>
var select = document.getElementById('sectie');
var option;
for (var i = 0; i < select.options.length; i++){
    option = select.options[i];
    if (option.text === 'dessert'){
        option.setAttribute('selected', true);
    }
}
</script>";
            break;

    }
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
