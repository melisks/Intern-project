<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "vendor") {
    $pid = $_GET['pid'];
    include "../includes/sqlcon.php";
    $status = mysqli_query($con, "DELETE FROM product_info WHERE product_info.pid =" . $pid);
    if ($status) {

        header("location:manageproduct.php?click1=no&click2=no");
    } else {
        echo mysqli_error($conn);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>