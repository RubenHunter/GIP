<?php
include "../connect.php";
session_start();

$sql = "SELECT * FROM tblgebruikers WHERE volgnummer='" . $_SESSION["gebruiker"]["volgnummer"] . "'";
$resultaat = $mysqli->query($sql);
$account = $resultaat->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>BAZcanteen Confirm Order</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" type="image/png" href="../images/bazlogo.png"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!--card template css-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

</head>
<body>
<?php
//insert into database using the session arrays.
$sql = "INSERT INTO tblorders (orderId, nr, datum, prijsBetaald, tijd) VALUE ('" . $_SESSION["orderId"] . "','" . $account["volgnummer"] . "', '" . $_SESSION["cartDate"] . "', '" . $_SESSION["price"] . "','" . $_SESSION["cartTime"] . "')";
//print $sql;print "<br>";
if ($mysqli->query($sql)) {
    $confirm = true;
} else {

    $error = true;
}
$numCartId = count($_SESSION["cartId"]);
print $numCartId;
if ($numCartId == 0) {
    //
    header("Location: cancel.php");
} else {
    for ($i = 0; $i < $numCartId; $i++) {
        /*
        $idString = strval($id);
        if (++$i === $numCartId) {
            //last index
            $ids = $ids . $idString;
        }else{
            $ids = $ids . $idString . ",";
        }
        print $ids;print "<br>";
        */
        $sql1 = "INSERT INTO tblorderinhoud (orderId, productId, quantiteit) VALUE ('" . $_SESSION["orderId"] . "', '" . $_SESSION["cartId"][$i] . "', '" . $_SESSION["cartQuantity"][$i] . "')";
        //print $sql1;print "<br>";
        if ($mysqli->query($sql1)) {
            $confirm = true;
            print $sql1;
            print "<br>";
            header("Location: thankyou.php");
        } else {
            $error = true;
        }
    }
}

/*
$quantities = "";
$numCartQuantity = count($_SESSION["cartQuantity"]);
$i = 0;
foreach ($_SESSION["cartQuantity"] as $quantity){

    $quantityString = strval($quantity);
    if (++$i === $numCartQuantity) {
        //last index
        $quantities = $quantities . $quantityString;
    }else{
        $quantities = $quantities . $quantityString . ",";
    }
    print $quantities;print "<br>";
    $sql2 = "UPDATE  tblorderinhoud SET (orderId, quantiteit) VALUE ('".$_SESSION["orderId"]."','$quantity') WHERE ";
    print $sql2;print "<br>";
    if ($mysqli->query($sql2)){
        $confirm = true;
    } else {
        $error = true;
    }
}*/

?>
</body>
</html>
