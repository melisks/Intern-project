<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    include "../includes/sqlcon.php";
    $uid = $_SESSION['uid'];
    $pid = $_GET['pid'];
    $status = "DELETE FROM order_info WHERE uid=$uid AND pid=$pid";
    $rrm = mysqli_query($con, $status);
    if ($rrm) {
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