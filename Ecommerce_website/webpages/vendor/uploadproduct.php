<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "vendor") {
    $vid = $_SESSION['uid'];
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdescripition'];
    $pprice = $_POST['pprice'];
    $file_name = $_FILES['ppicture']['name'];
    $ppicpath = "../../productImg/" . $file_name;
    move_uploaded_file($_FILES['ppicture']['tmp_name'], $ppicpath);
    include "../includes/sqlcon.php";
    $status = mysqli_query($con, "insert into product_info(vid,pname,pprice,pdescription,ppicture) value('$vid','$pname','$pprice','$pdesc','$ppicpath')");
    if ($status) {
        header("location:manageproduct.php?click1=no&click2=no");
    } else {
        echo mysqli_error($con);
    }
} else {
    header("location:../index/home.php?login=no&register=no");
}
?>