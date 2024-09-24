<?php
include "../connect.php";
session_start();
if (!isset($_SESSION["gebruiker"])) {
    header("location:../login");
}
$sql ="SELECT * FROM tblgebruikers WHERE volgnummer='".$_SESSION["gebruiker"]["volgnummer"]."'";
$resultaat =$mysqli->query($sql);
$account =$resultaat->fetch_assoc();
if ($account["subscribed"] == 1){
    $subscribed = true;
} else{
    $subscribed = false;
}
$admin = false;
if ($account["admin"] == 1){$admin = true;}
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>BAZcanteen Account</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <style>
        * {
            padding: 0;
            margin: 0;
        }
    </style>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Bootstrap css links account summary-->
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../images/BAZANDPOORT.png" alt="" class="bazlogo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation" onclick="loguit()">
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
                            <a class="dropdown-item" href="../stuff.php">Credits</a>
                            <a class="dropdown-item" href="../gallery.php">Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="../cart.php">Shopping cart <i style="font-size:20px" class="fa">&#xf07a;</i></a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                    <li class="nav-item active"><a class="nav-link" href="account.php">Account</a></li>
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
                <h1>Account</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->

<!--Start account summary-->
<div class="container" style="margin-top: 10px;margin-bottom: 10px">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action">Account Summary</a>
                <a href="ww.php" class="list-group-item list-group-item-action">Change Password</a>
                <a href="avatar.php" class="list-group-item list-group-item-action">Avatar</a>
                <a href="orders.php" class="list-group-item list-group-item-action active">Orders</a>
                <a href="verwijder.php" class="list-group-item list-group-item-action">Delete Account</a>
                <a href="reclame.php" class="list-group-item list-group-item-action ">Advertisements</a>
                <a href="paymentMethod.php" class="list-group-item list-group-item-action">Payment Method</a>
                <?php if ($admin){print'<a href="../admin/index.php" class="list-group-item list-group-item-action">Go to admin page</a>';} ?>
                <a href="../loguit.php" class="list-group-item list-group-item-action">Log out</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body" style="max-height: 700px; overflow-y: scroll">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php print $account["voornaam"] ." ". $account["naam"];?></h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <?php

                        $sql = "SELECT * FROM tblorders WHERE nr= '".$account["volgnummer"]."'";
                        $resultaat = $mysqli->query($sql);
                        $aantal = "SELECT COUNT(*) FROM tblorders WHERE nr= '".$account["volgnummer"]."'"; $result = mysqli_query($mysqli,$aantal); $rows = mysqli_fetch_row($result);
                        $amount = $rows[0];
                        if ($amount == 0){
                        print '
                        <h2 style="text-align: center;margin: auto;">Seems like you have yet to place an order</h2>
                        ';
                        }else{
                            print "<h1 style='margin: 0 0 0 0;
                                text-align: center;
                                font-size: 2.5rem;
                                padding: 0;
                                letter-spacing: 0.5px;
                                color: #333;
                                '>List of orders ($amount)</h1>";

                            while ($row = $resultaat->fetch_assoc()){
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
                                        font-size: 1.25rem;">'.$row["datum"].'</h3>
                                    <h2 style="padding: 0">Paid price: €'.$row["prijsBetaald"].'</h2>
                                    <h1 style="margin: 0 0 1rem 0;
                                        padding: 0;
                                        font-size: 2.5rem;
                                        letter-spacing: 0.5px;
                                        color: #333;">'.$row["orderId"].'</h1>
                                    ';

                                    $sql2 = "SELECT * FROM tblorderinhoud WHERE orderId = '".$row["orderId"]."'";
                                    $resultaat2 = $mysqli->query($sql2);
                                    while ($row2 = $resultaat2->fetch_assoc()){
                                    $sql3 = "SELECT * FROM tblproduct WHERE id= '".$row2["productId"]."'";
                                    $resultaat3 = $mysqli->query($sql3);
                                    $row3 = $resultaat3->fetch_assoc();

                                    print '
                                    <p style="margin: 0 0 0 0;
                                        font-size: 1.5rem;
                                        color: #333;">x'.$row2["quantiteit"].' '.$row3["naamproduct"].' </p>


                                    ';
                                    }
                                    /*
                            print '<script type="text/javascript">
                            document.getElementById("' . $row["orderId"] . '").innerHTML = "Paid price: €'.$row["prijsBetaald"].'";
                            console.log(document.getElementById("' . $row["orderId"] . '").innerHTML);
                            </script>
                            ';*/
                                    print '
                                    <p style="margin-top: 10px;font-size: 1.5rem;
                                        color: #333;">Time of pickup: '.$row["tijd"].'</p>
                                </div>
                            </div>
                        </div>';
                            
                        }
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End account summary-->

<?php include "../footer.php";?>
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