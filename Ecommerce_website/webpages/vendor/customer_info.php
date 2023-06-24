<?php
include "../includes/sqlcon.php";
$status = "SELECT * FROM user_info WHERE uid=$uid"; //this is not issue 
$result = mysqli_query($con, $status);
$row = mysqli_fetch_assoc($result);
$name = $row['uname'];
$umobile = $row['umobile_no'];
$uemail = $row['uemail'];
$uaddress = $row['useraddress'];
echo "<div>";
echo "<!DOCTYPE html>
  <html lang=\"en\">
  
  <head>
      <meta charset=\"UTF-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
      <link rel=\"stylesheet\" href=\"../../css/bootstrap.min.css\">
      <link rel=\"stylesheet\" href=\"../../css/profile.css\">
      <script src=\"../../js/bootstrap.min.js\"></script>
      <style>
            #datadiv{
                height:360px !important;
                z-index:1;
            }
      </style>
  </head>
  
  <body>
            <a id=\"cross\" href=\"ordermanage.php?cinfo=no\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"currentColor\" class=\"bi bi-x-circle-fill\" viewBox=\"0 0 16 16\">
            <path d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z\"/>
          </svg></a>
      <div id=\"profdiv\">
          <div id=\"datadiv\">
              <h3>Customer Info</h3>
              <div>
                  <div class=\"data\">
                      <label for=\"name\">Name :-</label>
                      <h5>$name</h5>
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
              </div>
          </div>
      </div>
  </body>
  
  </html>";

echo "</div>";
echo "</div>";
?>