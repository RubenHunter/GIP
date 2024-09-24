<?php
include "../connect.php";
session_start();
if (!isset($_SESSION["gebruiker"])) {
    header("location:../login");
}
$sql ="SELECT * FROM tblgebruikers WHERE volgnummer='".$_SESSION["gebruiker"]["volgnummer"]."'";
$resultaat =$mysqli->query($sql);
$account =$resultaat->fetch_assoc();
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
<?php
$success = false;
$fail = false;
if (isset($_POST["submit"])){
    $voornaam = $_POST["voornaam"];
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $gsm = $_POST["gsmnummer"];
    if ($gsm == ""){
        $gsm = 0;
    }

    $sql1 = "UPDATE tblgebruikers SET naam='$naam', voornaam='$voornaam', email='$email', gsmnummer='$gsm' WHERE volgnummer=".$account["volgnummer"]." ";
    if ($mysqli->query($sql1)){
        $success = true;
    }else{
        $fail = true;
        print $sql1;
    }
}

?>
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
<!--TEMPLATE: https://bootsnipp.com/snippets/bx5Be -->
<div class="container" style="margin-top: 10px;margin-bottom: 10px">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="account.php" class="list-group-item list-group-item-action active">Account Summary</a>
                <a href="ww.php" class="list-group-item list-group-item-action">Change Password</a>
                <a href="avatar.php" class="list-group-item list-group-item-action">Avatar</a>
                <a href="orders.php" class="list-group-item list-group-item-action">Orders</a>
                <a href="verwijder.php" class="list-group-item list-group-item-action">Delete Account</a>
                <a href="reclame.php" class="list-group-item list-group-item-action">Advertisements</a>
                <a href="paymentMethod.php" class="list-group-item list-group-item-action">Payment Method</a>
                <?php if ($admin){print'<a href="../admin/index.php" class="list-group-item list-group-item-action">Go to admin page</a>';} ?>
                <a href="../loguit.php" class="list-group-item list-group-item-action">Log out</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php print $account["voornaam"] ." ". $account["naam"];?></h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="account.php" method="post">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">First Name</label>
                                    <div class="col-8">
                                        <input id="name" name="voornaam" value='<?php echo isset($_POST['voornaam']) ? htmlspecialchars($_POST['voornaam'], ENT_QUOTES) : $account["voornaam"];?>' class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                    <div class="col-8">
                                        <input id="lastname" name="naam" value='<?php echo isset($_POST['naam']) ? htmlspecialchars($_POST['naam'], ENT_QUOTES) :  $account["naam"]; ?>' class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email*</label>
                                    <div class="col-8">
                                        <input id="email" name="email" value='<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) :  $account["email"]; ?>' class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gsmnummer" class="col-4 col-form-label">GSM nummer</label>
                                    <div class="col-8">
                                        <input id="gsmnummer" name="gsmnummer" value='<?php echo isset($_POST['gsmnummer']) ? htmlspecialchars($_POST['gsmnummer'], ENT_QUOTES) :  $account["gsmnummer"]; ?>' class="form-control here" type="tel" maxlength="10">
                                    </div>
                                </div>
                                <?php
                                if ($success){
                                    print "<a style='color: blue'>Your data has successfully been updated</a><br>";
                                }
                                if ($fail){
                                    print "<a style='color: red'>Something went wrong while processing your data</a><br>";
                                }
                                ?>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
<script src="../js/jquery.mapify.js"></script>
<script src="../js/form-validator.min.js"></script>
<script src="../js/contact-form-script.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>