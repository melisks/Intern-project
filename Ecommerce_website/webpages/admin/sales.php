<?php
include "../includes/auth.php";
if ($_SESSION['login_state'] == true) {
    $uname = $_SESSION['uname'];
    echo "<style>#sales{color: white;}.float-left{float:left;}.float-right{float:right;}.bt{width:auto; margin:5px 4px 0px 0px}#productlist{position: absolute; top: 150; z-index:0;}.card-text{height:48px}img{weight:287px;height:192px;}</style>";
    include "../includes/amenubar.html";
    echo "<script>uname= document.getElementById(\"username\");
    uname.innerHTML = \"$uname\";</script>";

    echo "<div class=\"float-left\"><h1 class\"float-left\">Sales Data</h1></div>";


    include "../includes/sqlcon.php";
    $sales = "SELECT * FROM order_received";
    $result4 = mysqli_query($con, $sales);
    $row_count4 = mysqli_num_rows($result4);
    echo "<div>";
    echo "<div id=\"productlist\" style=\"height:100vh;margin-left:245px\" class=\"d-flex justify-content-start flex-wrap\">";
    echo "<div style=\"width: 1000px;display:flex;justity-content:center\">
    <canvas id=\"myChart\"></canvas>
  </div>
  
  <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
  
  <script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['day 1', 'day 2', 'day 3', 'day 4', 'day 5', 'day 6','today'],
        datasets: [{
          label: 'No. of Sales',
          data: [2, 4, 3, 5, 2, 10, $row_count4],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  ";
    echo "</div>";
    echo "</div>";

} else {
    header("location:../index/home.php?login=no&register=no");
}
?>