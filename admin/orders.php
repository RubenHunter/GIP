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
    <title>Order list</title>
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
                        <li class="nav-item"><a class="nav-link" href="gebruikers.php">AllUsers</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php">AddProduct</a></li>
                        <li class="nav-item"><a class="nav-link" href="lijstproducten.php">ProductList</a></li>

                        <li class="nav-item"><a class="nav-link" href="menuLijst.php">MenuList</a></li>
                        <li class="nav-item active"><a class="nav-link" href="orders.php">Orders</a></li>
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
                    <h1>Order List</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End header -->
    <?php
    if (isset($_POST["submit"])) {
        $orderId = $_POST["orderId"];
        $sql4 = "UPDATE tblorders SET completed = 1 WHERE orderId = '$orderId'";
        if ($mysqli->query($sql4)) {
            print "Order: $orderId is now completed.";
        } else {
            print $sql4;
        }
    }
    $today = date("d/m/Y");
    $sql = "SELECT * FROM tblorders WHERE datum= '" . $today . "' AND completed = 0";
    print '<h2 style="text-align: center; margin-top: 20px">Only showing orders from today "' . ($today) . '"</h2>';
    $resultaat = $mysqli->query($sql);
    $aantal = "SELECT COUNT(*) FROM tblorders WHERE datum='" . $today . "' AND completed = 0";
    $result = mysqli_query($mysqli, $aantal);
    $rows = mysqli_fetch_row($result);
    $amount = $rows[0];
    if ($amount == 0) {
        print '
    <h2 style="text-align: center">Seems like there are no orders for today so far.</h2>
    ';
    } else {
        while ($row = $resultaat->fetch_assoc()) {
            $sql5 = "SELECT * FROM tblgebruikers WHERE volgnummer = '" . $row["nr"] . "'";
            $resultaat5 = $mysqli->query($sql5);
            $row5 = $resultaat5->fetch_assoc();
            print '
    <div class="wrapper" style="width: 100%;height: 55vh;">
      <div class="blog_post" style="text-align: left;
                                position: relative;
                                padding: 4rem 4rem 4rem 4rem;
                                background: #fff;
                                max-width: 500px;
                                border-radius: 10px;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);">
       
        <div class="container_copy">
          <h3 style="margin: 0 0 0.5rem 0;
                                        padding: 0;
                                        color: #999;
                                        font-size: 1.25rem;">' . $row["datum"] . '</h3>
          <h2 style="padding: 0">' . $row5["voornaam"] . ' ' . $row5["naam"] . '</h2>
          <h1 style="margin: 0 0 1rem 0;
                                        padding: 0;
                                        font-size: 2.5rem;
                                        letter-spacing: 0.5px;
                                        color: #333;">' . $row["orderId"] . '</h1>
          ';

            $sql2 = "SELECT * FROM tblorderinhoud WHERE orderId = '" . $row["orderId"] . "'";
            $resultaat2 = $mysqli->query($sql2);
            while ($row2 = $resultaat2->fetch_assoc()) {
                $sql3 = "SELECT naamproduct FROM tblproduct WHERE id= '" . $row2["productId"] . "'";
                $resultaat3 = $mysqli->query($sql3);
                $row3 = $resultaat3->fetch_assoc();

                print '
          <p style="margin: 0 0 0 0;
                                        font-size: 1.5rem;
                                        color: #333;">x' . $row2["quantiteit"] . ' ' . $row3["naamproduct"] . ' </p>
          
        
    ';
            }
            print '
        <p style="margin-top: 10px;font-size: 1.5rem;
                                        color: #333;">Time of pickup: ' . $row["tijd"] . '</p>
        </div>
        <form action="orders.php" method="post">
            <input type="hidden" name="orderId" value="' . $row["orderId"] . '">
            <div class="buttonDiv" style="margin-top: 30px;
    margin-bottom: -40px;
    display: flex;
    justify-content: center;
    align-items: center;">
                <button type="submit" id="sumbit" name="submit" class="btn_primary" style="margin: auto;
    border: none;
    outline: none;
    background: linear-gradient(90deg, #ff9966, #ff5e62);
    padding: 0.7rem 3rem;
    border-radius: 50px;
    color: white;
    font-size: 1.2rem;
    box-shadow: 1px 10px 2rem rgba(255, 94, 98, 0.5);
    transition: all .2s ease-in;
    text-decoration: none;
    cursor:pointer
    ">Completed</button>
            </div>
            
        </form>
        
      </div>
    </div>';

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
