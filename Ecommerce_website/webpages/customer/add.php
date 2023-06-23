<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    $address = $_POST['add'];
    $uid = $_SESSION['uid'];
    include "../includes/sqlcon.php";
    $query = "UPDATE user_info SET useraddress = '$address' WHERE uid=$uid";
    $status = mysqli_query($con, $query);
    if ($status) {
        echo "<script>alert('Address Updated Successfully');</script>";
        header("location:profile_info.php?change=no");
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}