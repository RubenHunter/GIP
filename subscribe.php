<?php
include "connect.php";
session_start();
include "ifSession.php";
$sql2 ="SELECT * FROM tblgebruikers WHERE volgnummer='".$_SESSION["gebruiker"]["volgnummer"]."'";
$resultaat =$mysqli->query($sql2);
$account =$resultaat->fetch_assoc();
if (isset($_POST["submit"])){
    $email = $_POST["email"];
    if ($account["subscribed"] == 1){
        $sql = "UPDATE tblgebruikers SET subscribed= 0 WHERE email = '$email'";
        if ($mysqli->query($sql)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            print $sql;
        }else{
            print "Something went wrong";
            print $sql;
        }
    }else{
        $sql = "UPDATE tblgebruikers SET subscribed= 1 WHERE email = '$email'";
        if ($mysqli->query($sql)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            print $sql;
        }else{
            print "Something went wrong";
            print $sql;
        }
    }
}