<?php
$uid = $_SESSION['uid'];
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
        right: 154px;
        bottom: 30px;
        z-index:1;
    }

    .btx {
        position: relative;
        left: 198px;
        bottom: 65px;
    }
    </style>
</head>

<body>

    <div class=\"mblock d-flex justify-content-center\">
        <div class=\"container0\">
            <form action=\"add.php\" method=\"post\">
                <div class=\"card\" style=\"width: 18rem;\">

                    <div class=\"card-body\">
                        <h1>Add Address</h1>
                        <input class=\"inpbox\" minlength=\"8\" placeholder=\"Address\" type=\"text\" name=\"add\" id=\"price\"
                            required>
                        <br>
                        <input id=\"smtbtn\" type=\"submit\" value=\"Submit\">

                    </div>
                </div>
            </form>
            <a href=\"profile_info.php?change=no\" class=\"btx btn btn-danger\">Cancel</a>
        </div>
    </div>
</body>

</html>";
?>