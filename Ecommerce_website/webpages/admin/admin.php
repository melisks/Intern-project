<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true) {
  $uname = $_SESSION['uname'];
  echo "<style>#home{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}.card{margin-left:75px}.btn{width:101px !important}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
  echo "<title>Home page</title>";
  include "../includes/amenubar.html";
  echo "<script>uname= document.getElementById(\"username\");
  uname.innerHTML = \"$uname\";</script>";
  echo "<div class=\"float-left\"><h1 class\"float-left\">Dashboard</h1></div>";
  include "../includes/sqlcon.php";
  $vendors = "SELECT * FROM user_info WHERE utype='vendor'";
  $result1 = mysqli_query($con, $vendors);
  $row_count1 = mysqli_num_rows($result1);
  $customer = "SELECT * FROM user_info WHERE utype='customer'";
  $result2 = mysqli_query($con, $customer);
  $row_count2 = mysqli_num_rows($result2);
  $products = "SELECT * FROM product_info";
  $result3 = mysqli_query($con, $products);
  $row_count3 = mysqli_num_rows($result3);
  $sales = "SELECT * FROM order_received";
  $result4 = mysqli_query($con, $sales);
  $row_count4 = mysqli_num_rows($result4);

  echo "<div>";
  echo "<div id=\"productlist\" class=\"d-flex justify-content-start flex-wrap\">";
  echo "<div class=\"card\" style=\"width: 18rem;\">
  <img src=\"../../img/img1.jpg\" class=\"card-img-top\" alt=\"vendors\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Current No. of Vendors $row_count1</h5>
    <p class=\"card-text\">Some quick example text to build on the card title </p>
    <a href=\"#\" class=\"btn btn-primary\">Vendors</a>
  </div>
</div>";
  echo "<div class=\"card\" style=\"width: 18rem;\">
  <img src=\"../../img/img2.jpg\" class=\"card-img-top\" alt=\"customers\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Current No. of Customers $row_count2</h5>
    <p class=\"card-text\">Some quick example text to build on the card title </p>
    <a href=\"#\" class=\"btn btn-primary\">Customers</a>
  </div>
</div>";
  echo "<div class=\"card\" style=\"width: 18rem;\">
  <img src=\"../../img/img3.jpg\" class=\"card-img-top\" alt=\"products\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Current No. of Products $row_count3</h5>
    <p class=\"card-text\">Some quick example text to build on the card title </p>
    <a href=\"product.php\" class=\"btn btn-primary\">Products</a>
  </div>
</div>";
  echo "<div class=\"card\" style=\"width: 18rem;\">
  <img src=\"../../img/img4.jpg\" class=\"card-img-top\" alt=\"sales\">
  <div class=\"card-body\">
    <h5 class=\"card-title\">Current No. of Sales $row_count4</h5>
    <p class=\"card-text\">Some quick example text to build on the card title </p>
    <a href=\"#\" class=\"btn btn-primary\">Sales</a>
  </div>
</div>";
  echo "</div>";
  echo "</div>";
} else {
  header("location:../admin/login.html");
}
?>