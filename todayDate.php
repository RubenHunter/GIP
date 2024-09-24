<?php
$today = date("D");
//$today = "Fri";
switch ($today){
case "Mon":$today = "Monday";$message = "";
break;
case "Tue":$today = "Tuesday";$message = "";
break;
case "Wed":$today = "Wednesday";$message = "The canteen is closed on Wednesdays!";
break;
case "Thu":$today = "Thursday";$message = "";
break;
case "Fri":$today = "Friday";$message = "";
break;
case "Sat":$today = "Saturday";$message = "The canteen is closed in the weekend!";
break;
case "Sun":$today = "Sunday";$message = "The canteen is closed in the weekend!";
break;
}
?>