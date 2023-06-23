<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    $pid = $_GET['pid'];
    $uid = $_SESSION['uid'];
    include "../includes/sqlcon.php";
    $status = "INSERT INTO cancel_order SELECT orderid, pid, uid FROM order_info WHERE uid=$uid";
    $rm = "DELETE FROM order_info WHERE pid=$pid AND uid=$uid";
    $result = mysqli_query($con, $status);
    $rrm = mysqli_query($con, $rm);
    if ($result) {
        header("location:order.php");
    } else {
        echo mysqli_error($con);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>