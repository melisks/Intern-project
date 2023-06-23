<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "vendor") {
    $price = $_POST['pprice'];
    $pid = $_GET['pid'];
    include "../includes/sqlcon.php";
    $query = "UPDATE product_info SET pprice = $price WHERE pid=$pid";
    $status = mysqli_query($con, $query);
    if ($status) {
        echo "<script>alert('Price Updated Successfully');</script>";
        header("location:manageproduct.php?click1=no&click2=no");
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}