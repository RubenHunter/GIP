<?php
session_start();
print_r($_SESSION["cartId"]);
print_r($_SESSION["cartQuantity"]);
/*$sqlCart = "SELECT * FROM tblwinkelwagen WHERE nr = '" . $_SESSION["gebruiker"]["volgnummer"] . "'";
$resultaatCart = $mysqli->query($sqlCart);
$cartInfo = array();
while ($info = $resultaatCart->fetch_assoc()) {


    $fieldInfo = $resultaatCart->fetch_fields();
    foreach ($fieldInfo as $val) {
            $arr = array($val->name => $info[$val->name]);
            $cartInfo = array_merge($cartInfo, $arr);
    }

    $_SESSION["cart"] = $cartInfo;
}*/


