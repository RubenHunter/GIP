<?php
include "connect.php";
session_start();

if (isset($_POST["submit"])) {
    $productid = $_POST["productid"];

    $sql = "DELETE FROM tblwinkelwagen WHERE productid ='$productid' AND nr='".$_SESSION["gebruiker"]["volgnummer"]."'";
    if ($mysqli->query($sql)) {
        header("Location:cart.php");
        print $sql;
    }else{
        print "Something went wrong";
        print $sql;
    }
}
/**
 * Created by PhpStorm.
 * User: ruben.moons
 * Date: 28/01/2022
 * Time: 15:54
 */