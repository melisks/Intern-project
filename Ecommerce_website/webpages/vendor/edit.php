<?php
$pid = $_GET['pid'];
echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"../../css/bootstrap.min.css\">
    <script src=\"../../js/bootstrap.min.js\"></script>
    <link rel=\"stylesheet\" href=\"../../css/upload.css\">
    <style>
        .container0 {
            padding: 0;
            height: fit-content;
            width: fit-content;
            position: relative;
            right: 77px;
            bottom: 30px;
        }

        .btx {
            position: relative;
            left: 198px;
            bottom: 65px;
        }
    </style>

    <title>Add New Product</title>
</head>

<body>

    <div class=\"mblock d-flex justify-content-center\">
        <div class=\"container0\">
            <form action=\"editproduct.php?pid=$pid\" method=\"post\">
                <div class=\"card\" style=\"width: 18rem;\">

                    <div class=\"card-body\">
                        <h1>Edit Product price</h1>
                        <input class=\"inpbox\" placeholder=\"Product price in $\" type=\"text\" name=\"pprice\" id=\"price\"
                            required>
                        <br>
                        <input id=\"smtbtn\" type=\"submit\" value=\"Edit Price\">

                    </div>
                </div>
            </form>
            <a href=\"manageproduct.php?click1=no&click2=no\" class=\"btx btn btn-danger\">Cancel</a>
        </div>
    </div>
</body>

</html>";
?>