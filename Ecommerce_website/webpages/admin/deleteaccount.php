<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true) {
    $uid = $_GET['uid'];
    $utype = $_GET['utype'];
    include "../includes/sqlcon.php";
    $status = mysqli_query($con, "DELETE FROM user_info WHERE uid =$uid");
    if ($status) {
        if ($utype == "customer") {
            header("location:customer.php");
        }
        if ($utype == "vendor") {
            header("location:vendor.php");
        }
    } else {
        echo mysqli_error($conn);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>