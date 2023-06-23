<?php
$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$umobile_no = $_POST['umobile_number'];
$upass = $_POST['upass'];
$login_as = $_POST['login_as'];
$TC = $_POST['T&C'];
$cipher_pass = md5($upass);

include "../includes/sqlcon.php";

$status = mysqli_query($con, "INSERT INTO user_info(uname,uemail,umobile_no,upass,utype,TC) VALUE('$uname','$uemail','$umobile_no','$cipher_pass','$login_as','$TC')");
if ($status) {
    header("location:home.php?login=yes&register=no");
} else {
    echo mysqli_error($con);
}
?>