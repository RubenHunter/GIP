<?php
if (!isset($_SESSION["gebruiker"])) {
    header("location:login");
}
