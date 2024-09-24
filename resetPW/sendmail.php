<?php
include "../connect.php";
session_start();

$mail = $_SESSION["mail"];

$headers = 'From: bazcantine@gmail.com' . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=utf-8';

//random code aanmaken
$randomCode = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);

$_SESSION["code"] = $randomCode;

$subject = "Forgot password";

$body = "To change your password press the link and type in your new password.\n href: http://gip/resetPW/index.php?code=$randomCode";


$result = mail($mail, $subject, $body, $headers);



/**
 * Created by PhpStorm.
 * User: ruben.moons
 * Date: 14/01/2022
 * Time: 14:33
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mail Send</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

</head>
<body>
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Mail Send</h1>
            </div>
        </div>
    </div>
</div>
<!-- End All Pages -->
<div class="container">
    <?php
    var_dump($result);
    ?>
    <h1 style="text-align: center; margin-top: 25px;">The mail has been send, open your <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox">gmail</a></h1>
    <div class="inner-column" style=" margin: 0;text-align: center">
        <a class="btn btn-lg btn-circle btn-outline-new-white"
           href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"
           style="margin-bottom: 20px; margin-top: 20px;">Go to your gmail here</a>
    </div>
</div>

</body>
</html>
