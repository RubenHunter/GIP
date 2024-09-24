<?php
session_start();


if ($_POST["hour"] == "Hour" or $_POST["minute"] == "Minute"){
    $pass = "WrongData";

}else{
    $_SESSION["cartTime"] = $_POST["hour"] . ":" . $_POST["minute"] ;
    $_SESSION["cartDate"] = date("d/m/Y");
    $pass = "OK";
}
echo $pass;



?>