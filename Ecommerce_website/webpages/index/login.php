<?php
session_start();
$_SESSION['login_state'] = false;
$uname = $_POST['uname'];
$upass = $_POST['upass'];
$cipher_pass = md5($upass);

include "../includes/sqlcon.php";

$result = mysqli_query($con, "select * from user_info where uname='$uname' and upass='$cipher_pass'");
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
    echo "incorrect credintials";
} else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login_state'] = true;
    $_SESSION['uid'] = $row['uid'];
    $_SESSION['uname'] = $row['uname'];
    $_SESSION['utype'] = $row['utype'];
    if ($row['utype'] == "vendor") {
        header("location:../vendor/vendorwindow.php");
    } else if ($row['utype'] == "customer") {
        header("location:../customer/home.php");
    }

}

?>