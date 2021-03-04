<?php
require_once "db.php";
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $wpis = "SELECT title FROM tasks WHERE id='$id'";
    $sql = mysqli_query($conn, $wpis);
    $row = mysqli_fetch_assoc($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja zadania</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
    <h2>Edycja zadania</h2>
        <div class="add">
        <form action="index.php" method="post" autocomplete="off">
            <?php
            echo ('<input type="text" name="title" value="');
            echo $row['title'];
            echo '">';
            ?>
            
        <button type="submit">ok</button>
        </form>
        </div>
        
    </div>
</body>
</html>