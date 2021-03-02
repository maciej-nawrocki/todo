<?php
require_once "db.php";
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");
