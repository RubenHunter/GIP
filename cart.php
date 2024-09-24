<?php
include "connect.php";
session_start();
include "ifSession.php";
$sql ="SELECT * FROM tblgebruikers WHERE volgnummer='".$_SESSION["gebruiker"]["volgnummer"]."'";
$resultaat =$mysqli->query($sql);
$account =$resultaat->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>BAZcanteen Shopping cart</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" type="image/png" href="images/bazlogo.png"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--card template css-->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/checkout.css">
    
    <!--src idea https://stackoverflow.com/questions/2866063/submit-form-without-page-reloading -->
    <script>
        function ajaxgo(){
            //GET FORM DATA
            var data = new FormData();
            data.append("hour", document.getElementById("hour").value)
            data.append("minute", document.getElementById("minute").value)

            // AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "setTime.php");
            xhr.onload = function (){
                let response = this.response;
                console.log(response);

                if (response == "OK"){
                    document.getElementById("bnp-6262aca64fef040004b69f74").style.display = "inline";
                    document.getElementById("noButtonText").style.display = "none";
                    document.getElementById("timeSubmit").value = "Change Time";
                    alert("Time saved");
                } else if (response == "WrongData"){
                    alert("Can't put 'Hour' or 'Minute' as time");
                }else {
                    alert("error! try again");
                    console.log(response);
                }

            };
            xhr.send(data);

            //PREVENT HTML FORM SUBMIT
            return false;
        }
    </script>

</head>
<body>
<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/BAZANDPOORT.png" alt="" class="bazlogo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation" onclick="loguit()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="stuff.php">Credits</a>
                            <a class="dropdown-item" href="gallery.php">Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item active"><a class="nav-link" href="cart.php">Shopping cart <i style="font-size:20px" class="fa">&#xf07a;</i></a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="account/account.php">Account</a></li>
                </ul>
            </div>
        </div>
        <li class="nav-item"><a class="nav-link" href="loguit.php" id="logout">Logout</a></li>
    </nav>
</header>
<!-- End header -->

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>My shopping cart</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->
<!--TEMPLATE: https://bootstraptor.com/snippets/bootstrap-4-snippet-shopping-cart/-->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12" style="text-align: center; padding-right: 0px">
                <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                <?php
                $aantal = "SELECT COUNT(*) FROM tblwinkelwagen WHERE nr='".$_SESSION["gebruiker"]["volgnummer"]."'"; $result = mysqli_query($mysqli,$aantal); $rows = mysqli_fetch_row($result);
                $amount = $rows[0];
                if ($amount == 0){
                    print '
                    <p class="mb-5 text-center">
                    <i class="text-info font-weight-bold">' . $amount . '</i> items in your cart</p>
                    <h1>Seems like your cart is empty</h1>
                    <div class="inner-column"><a class="btn btn-lg btn-circle btn-outline-new-white" href="menu.php" style="margin-bottom: 20px; margin-top: 20px;">Go to the menu here</a></div>
                    
                    ';

                }else {
                    print '
                    <p class="mb-5 text-center">
                    <i class="text-info font-weight-bold">' . $amount . '</i> items in your cart</p>
                <table id="shoppingCart" class="table table-condensed table-responsive">
                    <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">PPU</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:16%"></th>
                    </tr>
                    </thead>
                    ';

                    $sql1 = "SELECT * FROM tblwinkelwagen WHERE nr = '" . $_SESSION["gebruiker"]["volgnummer"] . "'";
                    $resultaat1 = $mysqli->query($sql1);
                    $prijs = 0;
                    while ($row = $resultaat1->fetch_assoc()) {
                        $sql2 = "SELECT * FROM tblproduct where id='" . $row["productid"] . "'";
                        $resultaat2 = $mysqli->query($sql2);

                        while ($row1 = $resultaat2->fetch_assoc()) {
                            $prijs = $prijs + ($row1["prijs"] * $row["quantiteit"]);
                            if ($row1["foto"] == ""){
                                $row1["foto"] = "menuTemplate.png";
                            }
                            print '
                            <tr>
                        <td data-th="Product" id="productMeta">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <img src=uploads/' . $row1["foto"] . ' alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                </div>
                                <div class="col-md-9 text-left mt-sm-2">
                                    <h4 style="font-weight:bold;">' . $row1["naamproduct"] . '</h4>
                                    <p class="font-weight-light">' . $row1["descriptie"] . '</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">' . $row1["prijs"] . '</td>
                        <!--prijs bereken prijs * quantiteit-->
                        <form action="syncCart.php" method="post">
                        <td data-th="Quantity">
                            <input type="number" name="quantiteit" min="1" max="9" step="1" class="form-control form-control-lg text-center" value=' . $row["quantiteit"] . '>
                        </td>
                        <td class="actions" data-th="">
                        
                            <div class="text-right">
                                
                                <input type="hidden" name="productid" value=' . $row["productid"] . '>
                                
                                <button name="submit" type="submit" class="btn btn-white border-secondary bg-white btn-md mb-2" >
                                    <i class="fa fa-sync"></i>
                                </button>
                                </form>
                                <form action="deleteCart.php" method="post">
                                <input type="hidden" name="productid" value=' . $row["productid"] . '>
                                
                                <button name="submit" type="submit" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </form>
                            </div>
                            
                        </td>
                    </tr>
                    
                            ';
                        }
                    }
                    print '
                    </tr>
                    </tbody>
                </table>
                <div class="float-right text-right">
                    <h4>Subtotal:</h4>
                    <!--volledige prijs van quantiteit * prijs bereken-->
                    <h1>€'.$prijs.'</h1>
                </div>
                </div>
        </div>
                <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
                <!-- Trigger the modal with a button -->
            ';
                    if(date("G") <= 11)
                    {
                        if ($prijs <= 100){
                            print '
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Place order</button>
                            ';
                        }else{
                            print '
                            <p>You can not place an order on a cart that is worth more than €100.<br>Please remove some things from your cart.</p>
                            ';
                        }
                    }else{
                        print '
                            <p>You can only order before 11pm<br></p>
                            ';
                    }


             print '      
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="menu.php">
                    <i class="fa fa-arrow-left mr-2"></i> Continue Shopping</a>
            </div>
        </div>
                    ';
                }
                        ?>
            </div>
        </div>
    <?php include "checkoutModal.php";?>
    </div>
</section>

<?php include "footer.php";?>
<!-- End Footer -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="js/navbar.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<!-- ALL PLUGINS -->

<script src="js/jquery.superslides.min.js"></script>
<script src="js/images-loded.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/baguetteBox.min.js"></script>
<script src="js/jquery.mapify.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>

</body>
</html>
