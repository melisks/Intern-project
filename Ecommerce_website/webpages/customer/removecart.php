<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    $pid = $_GET['pid'];
    $uid = $_SESSION['uid'];
    include "../includes/sqlcon.php";
    $status = "DELETE FROM cart_info WHERE pid=$pid AND uid=$uid";
    $result = mysqli_query($con, $status);
    if ($result) {
        header("location:cart.php");
    } else {
        echo mysqli_error($con);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>