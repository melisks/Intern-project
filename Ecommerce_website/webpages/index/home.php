<?php
echo "<style>#home{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
echo "<title>Home page</title>";
include "defmenu.html";
echo "<div class=\"float-left\"><h1 class\"float-left\">All Products</h1></div>";
include "../includes/sqlcon.php";
$login = $_GET['login'];
$reg = $_GET['register'];
if ($login == "yes" && $reg == "no") {
  include "login.html";
}
if ($login == "no" && $reg == "yes") {
  include "register.html";
}
$status = "SELECT * FROM product_info ";
$result = mysqli_query($con, $status);
echo "<div>";
echo "<div id=\"productlist\" class=\"d-flex justify-content-start flex-wrap\">";
while ($rcnt = mysqli_fetch_assoc($result)) {
  $pid = $rcnt['pid'];
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
          <a href=\"home.php?login=yes&register=no\" id=\"addtocart\" class=\"btn btn-primary\">Add to Cart</a>
          <a href=\"home.php?login=yes&register=no\" id=\"buy\" class=\"btn btn-success\">Buy right now</a>
        </div>
        </div>
      </div>";
}
echo "</div>";
echo "</div>";
?>