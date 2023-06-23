<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "vendor") {
  $uname = $_SESSION['uname'];
  echo "<style>#view{color: white;}.float-left{float:left;}.bt{width:244.443px; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
  echo "<title>View My Products</title>";
  include "../includes/vmenubar.html";
  echo "<script>uname= document.getElementById(\"username\");
  uname.innerHTML = \"$uname\";</script>";
  echo "<div class=\"float-left\"><h1 class\"float-left\">Your All Products</h1></div>";
  include "../includes/sqlcon.php";
  $status = "SELECT * FROM product_info WHERE vid=" . $_SESSION['uid'];
  $result = mysqli_query($con, $status);
  echo "<div id=\"productlist\" class=\"d-flex justify-content-start flex-wrap\">";
  while ($rcnt = mysqli_fetch_assoc($result)) {
    $pid = $rcnt['pid'];
    $vid = $rcnt['vid'];
    $name = $rcnt['pname'];
    $des = $rcnt['pdescription'];
    $price = $rcnt['pprice'];
    $piclink = $rcnt['ppicture'];
    echo "<div class=\"card\" style=\"margin:0px 9px 5px 9px;; width: 18rem; height=304.3px\">
        <img src=\"$piclink\" style=\"height=161.1px\" class=\"card-img-top\" alt=\"Product Image\">
        <div class=\"card-body\" style=\"height=171.433px\">
          <h5 class=\"card-title\">$name</h5>
          <span ><h5 class=\"d-inline\">$</h5><h5 class=\"d-inline\">$price</h5></span>
          <p class=\"card-text\">$des</p>
          
        </div>
      </div>";
  }
  echo "</div>";
} else {
  header("location:../index/home.php?login=no&register=no");
}
?>