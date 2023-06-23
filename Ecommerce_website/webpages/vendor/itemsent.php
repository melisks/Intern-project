<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "vendor") {
    $pid = $_GET['pid'];
    $uid = $_GET['uid'];
    include "../includes/sqlcon.php";
    $status = "DELETE FROM order_info WHERE pid=$pid AND uid=$uid";
    $result = mysqli_query($con, $status);
    if ($result) {
        header("location:ordermanage.php?cinfo=no");
    } else {
        echo mysqli_error($con);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>