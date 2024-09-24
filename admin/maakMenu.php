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
    <title>Add to menu</title>
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
                <h1>Add to menu</h1>
            </div>
        </div>
    </div>
</div>
<!-- End header -->
<?php
$validDay = true;
if (isset($_POST["post"])) {
    $sql = "SELECT * FROM menus";
    $resultaat = $mysqli->query($sql);

    $id = $_POST["id"];
    $dag = $_POST["dag"];

    $test = false;
    while ($row = $resultaat->fetch_assoc()) {
        if ($row["product"] == $id && $row["dag"] == $dag) {
            $test = true;
            $validDay = false;
        }
    }

    if ($test) {
        print "This product is already on this menu!";
        print '<a href="lijstproducten.php"><div class="link">Back to productlist</div></a>';
    } else {
        $sql = "INSERT INTO menus(product, dag) VALUES ('" . $id . "', '" . $dag . "')";
        print $sql;
        print "<br>";
        if ($mysqli->query($sql)) {
            print "\nsuccesfully added";
            print '<a href="lijstproducten.php"><div class="link">Back to productlist</div></a>';
        } else {
            print "Something went wrong";
            print $sql;
        }
    }

} else {
    $sql = "SELECT * FROM tblproduct WHERE id= '" . $_GET["toetevoegen"] . "'";
    $resultaat = $mysqli->query($sql);
    $row = $resultaat->fetch_assoc();
    print'
    <form action="maakMenu.php" method="post" id="productForm">
<table class="table notTable">

            <input type="hidden" name="id" value=' . $row['id'] . '>
            <tr><td><label for="dag">Day </label></td>
            <td><select name="dag" id="dag" required>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select></td></tr>
            
    </table>
    <input type="submit" name="post" value="Add" class="change">
    </form>
    ';
}

?>
<a href="lijstproducten.php"><div class="link">Back to productlist</div></a>
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
