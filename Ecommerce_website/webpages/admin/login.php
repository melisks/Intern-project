<?php
session_start();
$_SESSION['login_state'] = false;
$uname = $_POST['uname'];
$upass = $_POST['upass'];
$cipher_pass = md5($upass);
include "../includes/sqlcon.php";

$result = mysqli_query($con, "select * from admin where aname='$uname' and apass='$cipher_pass'");
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
    echo "incorrect credintials";
} else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['login_state'] = true;
    $_SESSION['uid'] = $row['aid'];
    $_SESSION['uname'] = $row['aname'];
    header("location:../admin/admin.php");
}

?>