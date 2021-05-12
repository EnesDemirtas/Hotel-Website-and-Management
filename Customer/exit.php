<?php 

session_start();
require "../phpFunctions/routing.php";
session_unset();
session_destroy();
go("login.php");

?>