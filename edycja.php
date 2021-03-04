<?php
require_once "db.php";
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");
$id = null;
$title = '';
$row = [];
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $wpis = "SELECT title FROM tasks WHERE id='$id'";
    $sql = mysqli_query($conn, $wpis);
    $row = mysqli_fetch_assoc($sql);
    // var_dump($row);die;
}
if(isset($_POST['title']) && isset($_POST['id']))
{
    $title = $_POST['title'];
    $row['title'] = $title;
    $id = $_POST['id'];
    $add = "UPDATE tasks SET title = '$title' WHERE id ='$id'";
    mysqli_query($conn, $add);
    header('location: index.php');
   
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
        <form action="edycja.php" method="post" autocomplete="off">
            <?php
            // var_dump($row['title']);die;
            echo ('<input type="hidden" name="id" value="');
            echo $_GET['id'];
            echo '">';
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