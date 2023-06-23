<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "vendor") {
    $uname = $_SESSION['uname'];
    echo "<style>#manage{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
    echo "<title>Manage My Products</title>";
    include "../includes/vmenubar.html";
    echo "<script>uname= document.getElementById(\"username\");
    uname.innerHTML = \"$uname\";</script>";
    $upload = $_GET['click1'];
    $edit = $_GET['click2'];
    echo "<div class=\"float-left\"><h1 class\"float-left\"> Manage Your Products</h1></div><div class=\"float-right\"><a href=\"manageproduct.php?click1=yes&click2=no\"><button type=\"button\" class=\"bt btn btn-warning btn-md\">Add New product</button></a></div>";

    if ($upload == "yes") {
        include "uploadproduct.html";
    }
    if ($edit == "yes") {
        include "edit.php";
    }
    include "../includes/sqlcon.php";
    $status = "SELECT * FROM product_info WHERE vid=" . $_SESSION['uid'];
    $result = mysqli_query($con, $status);
    echo "<div>";
    echo "<div id=\"productlist\" class=\"d-flex justify-content-start flex-wrap\">";
    while ($rcnt = mysqli_fetch_assoc($result)) {
        $pid = $rcnt['pid'];
        $vid = $rcnt['vid'];
        $name = $rcnt['pname'];
        $des = $rcnt['pdescription'];
        $price = $rcnt['pprice'];
        $piclink = $rcnt['ppicture'];
        echo "<div class=\"card\" style=\"margin:0px 9px 5px 9px;width: 18rem; height=304.3px\">
        <img src=\"$piclink\" style=\"height=161.1px\" class=\"card-img-top\" alt=\"Product Image\">
        <div class=\"card-body\" style=\"height=171.433px\">
          <h5 class=\"card-title\">$name</h5>
          <span ><h5 class=\"d-inline\">$</h5><h5 class=\"d-inline\">$price</h5></span>
          <p class=\"card-text\">$des</p>
          <div>
          <a href=\"manageproduct.php?click1=no&click2=yes&pid=$pid\" id=\"edit\" class=\"btn btn-success\">Edit</a>
          <a href=\"deleteproduct.php?pid=$pid\" id=\"delete\" class=\"btn btn-danger\">Delete</a>
        </div>
        </div>
      </div>";
    }
    echo "</div>";
    echo "</div>";

} else {
    header("location:../index/home.php?login=no&register=no");
}
?>