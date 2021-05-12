<?php
session_start();

if (isset($_POST['session_temp'])) {





    unset($_SESSION['session_username']);

    header("Location:login.php");
}
