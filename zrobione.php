<?php
require_once "db.php";
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");

if(isset($_GET['id']))
{
$id = $_GET['id'];
$update = "UPDATE tasks SET checked = 1 WHERE id ='$id'";
mysqli_query($conn, $update);
header('location: index.php');
   
}