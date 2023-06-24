<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true) {
  $uname = $_SESSION['uname'];
  echo "<style>#vendor{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
  include "../includes/amenubar.html";
  echo "<script>uname= document.getElementById(\"username\");
    uname.innerHTML = \"$uname\";</script>";

  echo "<div class=\"float-left\"><h1 class\"float-left\">All vendors</h1></div>";


  include "../includes/sqlcon.php";
  $status = "SELECT * FROM user_info WHERE utype='vendor'";
  $result = mysqli_query($con, $status);
  echo "<div>";
  echo "<div id=\"productlist\" class=\"d-flex justify-content-start flex-wrap\">";
  while ($rcnt = mysqli_fetch_assoc($result)) {
    $uid = $rcnt['uid'];
    $name = $rcnt['uname'];
    $email = $rcnt['uemail'];
    $mobile = $rcnt['umobile_no'];
    $products = "SELECT * FROM product_info WHERE vid=$uid";
    $result3 = mysqli_query($con, $products);
    $row_count3 = mysqli_num_rows($result3);
    echo "<div class=\"card\" style=\"margin:0px 9px 5px 9px;width: 18rem;\">
        <img src=\"../../img/user.png\"  class=\"card-img-top\" alt=\"Product Image\">
        <div class=\"card-body\" style=\"height=171.433px\">
          <h5 class=\"card-title\">Name $name</h5>
          <p>Email $email</p>
          <p>Mobile No. $mobile</p>
          <span ><h5 class=\"d-inline\">No. of Products $row_count3</h5></span>
          <div>
          <a href=\"deleteaccount.php?uid=$uid&utype=vendor\" id=\"delete\" class=\"btn btn-danger\">Delete</a>
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