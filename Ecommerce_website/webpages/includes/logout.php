<?php
session_start();
session_destroy();
header("location:../index/home.php?login=no&register=no");
?>