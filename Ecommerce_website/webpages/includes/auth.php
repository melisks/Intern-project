<?php
session_start();
if (!isset($_SESSION['login_state'])) {
    header("location:../index/home.php?login=no&register=no");
    $state = "Illegal Attempt";
    die;
}
if ($_SESSION['login_state'] == false) {
    $state = "Login Failed; Unauthorised Attempt";
    header("location:../index/home.php?login=no&register=no");
    die;
}
?>