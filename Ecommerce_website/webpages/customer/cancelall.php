<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    include "../includes/sqlcon.php";
    $uid = $_SESSION['uid'];
    $status = "DELETE FROM order_info WHERE uid=$uid";
    $result = mysqli_query($con, $status);
    if ($result) {
        header("location:order.php");
    } else {
        echo mysqli_error($con);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>