<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    $pid = $_GET['pid'];
    $uid = $_SESSION['uid'];
    include "../includes/sqlcon.php";
    $status = "INSERT INTO order_info(pid,uid) VALUES('$pid','$uid')";
    $rm = "Delete FROM cart_info WHERE pid=$pid AND uid=$uid";
    $result = mysqli_query($con, $status);
    $rrm = mysqli_query($con, $rm);
    if ($result) {
        header("location:order.php");
    } else {
        echo mysqli_error($con);
    }
    if ($rrm) {
        die;
    } else {
        echo mysqli_error($con);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>