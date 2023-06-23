<?php

$uname = $_POST['uname'];
$upass = $_POST['upass'];
$uemail = $_POST['uemail'];
$umobile_no = $_POST['umobile_number'];
$cipher_pass = md5($upass);
include "../includes/sqlcon.php";

$result = mysqli_query($con, "select * from user_info where uname='$uname' and uemail='$uemail' and umobile_no=$umobile_no");
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
    echo "incorrect credintials";
    echo mysqli_error($con);
} else {
    $row = mysqli_fetch_assoc($result);
    $uid = $row['uid'];
    include "../includes/sqlcon.php";
    $query = "UPDATE user_info SET upass='$cipher_pass' WHERE uid=$uid";
    $status = mysqli_query($con, $query);
    if ($status) {
        echo "<script>alert('Address Updated Successfully');</script>";
        header("location:home.php?login=no&register=no");
    }
}

?>