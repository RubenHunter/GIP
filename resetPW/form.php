<?php
include "../connect.php";
session_start();
?>
<!DOCTYPE HTML>
<html class="supernova">
<head>
    <!--favicon-->
    <link rel="shortcut icon" href="https://imgur.com/a/ho7KUuS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
    <title>Reset password</title>
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <style type="text/css">@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?"/>
    <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/payment/payment_styles.css?3.3.29178" />
    <link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/css/styles/payment/payment_feature.css?3.3.29178" />
    <!--reset.css file-->
    <link type="text/css" rel="stylesheet" href="reset.css"/>
</head>
<body>
<?php
$validEmail = true;
if (isset($_POST["submit"])){
    $sql = "SELECT * FROM tblgebruikers";
    $resultaat = $mysqli->query($sql);

    $mail = $_POST["mail"];


    while ($row = $resultaat->fetch_assoc()) {
        if ($row['email'] == $mail) {
            $validEmail = true;
            $_SESSION["mail"] = $mail;
            //print $_SESSION["mail"];
            header("Location: sendmail.php");

        } else{
            $validEmail = false;
        }
    }
}
?>
<form class="jotform-form" action="form.php" method="post" id="213112881737051" accept-charset="utf-8" autocomplete="on">
    <div role="main" class="form-all">
        <div class="formLogoWrapper Left">
            <img alt="BA.png" class="formLogoImg" src="../images/bazlogo.png" height="140" width="140">
        </div>
        <style>
            .formLogoWrapper { display:inline-block; position: absolute; width: 100%;} .form-all:before { background: none !important;} .formLogoWrapper.Left { top: -150px; left: 0; text-align: left;}
        </style>
        <ul class="form-section page-section">
            <li id="cid_1" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-large">
                    <div class="header-text httal htvam">
                        <h1 id="header_1" class="form-header" data-component="header">
                            Reset Password
                        </h1>
                        <?php
                        if (!$validEmail){
                            print "<a style='color: red'>There does not exist an account with this email!</a>";
                            print "<br><br>";
                            print "<a>To make an account press </a> <a style='color: blue' href='../registrate'>here!</a>";
                        }
                        ?>
                    </div>
                </div>
            </li>
            <li class="form-line jf-required" data-type="control_textbox" id="id_4">
                <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4">
                    Enter mail
                    <span class="form-required">
                *
            </span>
                </label>
                <div id="cid_4" class="form-input jf-required" data-layout="half">
                    <input type="email" id="input_4" name="mail" data-type="input-textbox" class="form-textbox validate[required]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_4" required="" />
                </div>
            </li>
            <li class="form-line" data-type="control_button" id="id_2">
                <div id="cid_2" class="form-input-wide" data-layout="full">
                    <div data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                        <button id="input_2" type="submit" name="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">
                            Submit
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</form>
</body>
</html>

