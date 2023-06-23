<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
  $uname = $_SESSION['uname'];
  echo "<style>#order{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
  echo "<title>My Orders</title>";
  include "../includes/cmenubar.html";
  echo "<script>uname= document.getElementById(\"username\");
  uname.innerHTML = \"$uname\";</script>";
  echo "<div class=\"float-left\"><h1 class\"float-left\">My Orders</h1></div><div class=\"float-right\"><a href=\"cancelall.php\"><button type=\"button\" class=\"bt btn btn-warning btn-md\">Cancel All Orders</button></a></div>";
  include "../includes/sqlcon.php";
  $userid = $_SESSION['uid'];
  $total = 0;
  $status = "SELECT * FROM order_info JOIN product_info ON order_info.pid=product_info.pid WHERE uid=$userid";
  $result = mysqli_query($con, $status);
  echo "<div>";
  echo "<div id=\"productlist\" class=\"d-flex justify-content-start flex-wrap\">";
  while ($rcnt = mysqli_fetch_assoc($result)) {
    $pid = $rcnt['pid'];
    $name = $rcnt['pname'];
    $des = $rcnt['pdescription'];
    $price = $rcnt['pprice'];
    $piclink = $rcnt['ppicture'];
    $total = $total + $price;
    echo "<div class=\"card\" style=\"margin:0px 9px 5px 9px;width: 18rem; height=304.3px\">
        <img src=\"$piclink\" style=\"height=161.1px\" class=\"card-img-top\" alt=\"Product Image\">
        <div class=\"card-body\" style=\"height=171.433px\">
          <h5 class=\"card-title\">$name</h5>
          <span ><h5 class=\"d-inline\">$</h5><h5 class=\"d-inline\">$price</h5></span>
          <p class=\"card-text\">$des</p>
          <div>
          <a href=\"received.php?pid=$pid\" id=\"addtocart\" class=\"btn btn-success\">Item Received</a>
          <a href=\"removeorder.php?pid=$pid\" id=\"buy\" class=\"btn btn-danger\">Cancel Order</a>
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