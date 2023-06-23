<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    include "../includes/sqlcon.php";
    $uid = $_SESSION['uid'];
    $status = "INSERT INTO order_info SELECT * FROM cart_info WHERE uid=$uid";
    $rm = "DELETE FROM cart_info WHERE uid=$uid";
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