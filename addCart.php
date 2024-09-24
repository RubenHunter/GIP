<?php
include "connect.php";
session_start();
if (isset($_POST["submit"])){
    $id  = $_POST["id"];
    $quantity = $_POST["quantiteit"];
    $sql1 = "SELECT * FROM tblwinkelwagen where nr='".$_SESSION["gebruiker"]["volgnummer"]."'";
    $result = $mysqli->query($sql1);
    $exists = false;
    while ($check = $result->fetch_assoc()) {
        print $check["productid"];
        if ($check["productid"] == $id) {
            print $check["productid"] == $id;
            $quantity = $check["quantiteit"] + $quantity;
            if ($quantity > 9){
                $quantity = 9;
            }
            $exists = true;
        }
    }
    if ($exists){
        $sql = "UPDATE tblwinkelwagen SET quantiteit = '" . $quantity . "' WHERE nr = '" . $_SESSION["gebruiker"]["volgnummer"] . "' AND productid = '" . $id . "'";
        if ($mysqli->query($sql)) {
            header("Location:cart.php");
        } else {
            print "Something went wrong";
            print $sql;
        }
    }else{
        $sql = "INSERT INTO tblwinkelwagen (nr, productid, quantiteit) VALUES ('" . $_SESSION["gebruiker"]["volgnummer"] . "', '$id', '$quantity' )";
        if ($mysqli->query($sql)) {
            header("Location:cart.php");
        } else {
            print "Something went wrong";
            print $sql;
        }
    }
}