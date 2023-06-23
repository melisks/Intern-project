<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true && $_SESSION['utype'] == "customer") {
    $uname = $_SESSION['uname'];
    $uid = $_SESSION['uid'];
    echo "<style>#profile{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
    echo "<title>Home page</title>";
    include "../includes/cmenubar.html";
    echo "<script>uname= document.getElementById(\"username\");
  uname.innerHTML = \"$uname\";</script>";
    echo "<div class=\"float-left\"><h1 class\"float-left\">Personal Details</h1></div>";
    include "../includes/sqlcon.php";
    $status = "SELECT * FROM user_info WHERE uid=$uid";
    $result = mysqli_query($con, $status);
    $row = mysqli_fetch_assoc($result);
    $umobile = $row['umobile_no'];
    $uemail = $row['uemail'];
    $uaddress = $row['useraddress'];
    $change = $_GET['change'];
    if ($change == "yes") {
        include "add_address.php";
    }
    echo "<div>";
    echo "<!DOCTYPE html>
  <html lang=\"en\">
  
  <head>
      <meta charset=\"UTF-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
      <link rel=\"stylesheet\" href=\"../../css/bootstrap.min.css\">
      <link rel=\"stylesheet\" href=\"../../css/profile.css\">
      <script src=\"../../js/bootstrap.min.js\"></script>
  </head>
  
  <body>
      <div id=\"profdiv\">
          <div id=\"datadiv\">
              <h3>Personal Info</h3>
              <div>
                  <div class=\"data\">
                      <label for=\"name\">Name :-</label>
                      <h5>$uname</h5>
                  </div>
                  <div class=\"data\">
                      <label for=\"mobile\">Mobile No. :-</label>
                      <h5>$umobile</h5>
                  </div>
                  <div class=\"data\">
                      <label for=\"Email\">Email :-</label>
                      <h5>$uemail</h5>
                  </div>
                  <div class=\"data\">
                      <label for=\"address\">Address :-</label>
                      <h5>$uaddress</h5>
                  </div>
                  <a href=\"profile_info.php?change=yes\">
                  <button id=\"change\"  class=\"btn bg-primary\">Add Address</button>
                  </a>
                  
              </div>
          </div>
      </div>
  </body>
  
  </html>";

    echo "</div>";
    echo "</div>";

} else {
    header("location:../index/home.php?login=no&register=no");
}
?>