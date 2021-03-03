<?php
require_once "db.php";
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8") or die("Problemy z zapisem danych!");

// dodawanie zadania do bazy
if(isset($_POST['title']))
{
    $title = $_POST['title'];
    $add = "INSERT INTO tasks (title) VALUES ('$title')";
    $sql = mysqli_query($conn, $add);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista zadań</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
    <h2>Lista zadań</h2>
        <div class="add">
        <form action="index.php" method="post" autocomplete="off">
            <input type="text" name="title" placeholder="Dodaj nowe zadanie"><button type="submit">+</button>
        </form>
        </div>
        <div class="tasklist">
        <table>
            <?php
                $d = "SELECT * FROM tasks";
                $result = mysqli_query($conn, $d) or die("Problemy z odczytem danych!");
                
                while($row = mysqli_fetch_assoc($result))
                {
                echo '<tr><td><input type="checkbox" class="check-box"';
                if ($row['checked'] == 1) {echo 'checked';} 
                echo ' /></td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td><a href="/todo/edycja.php?id='.$row['id'].'">edytuj</a></td></tr>';
                }
            ?>
                
        </table>

        </div>
    </div>


</body>
</html>