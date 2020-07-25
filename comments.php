<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
    $conn= mysqli_connect($servername,$username,$password,$database);
    session_start();
    if(!isset($_SESSION['mail']))
    {
        header("Location: login.php");
    }
    $a = $_SESSION['mail'];
    $topic=$_GET['topic'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="commen.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <div class="top">
        <div >
            <?php
                $sql="SELECT `username` 
                FROM `login` 
                WHERE `email`='$a';";
                $result=mysqli_query($conn,$sql);
                $a= mysqli_num_rows($result);
                $rows=mysqli_fetch_row($result);
                $name=$rows[0];
                echo "WELCOME ",$rows[0];
            ?>
        </div>
        <span><?php  echo $name; ?></span>
        <div><a href="logout.php">LOG-OUT </a></div>
    </div>
    <button><a href="topic.php">BACK</a></button>
    <ul class="topics">
        <ul>
            <li id="imp"><?php echo $_GET['topic']; ?></li>
            <li ><?php echo $_GET['subject']; ?></li>
        </ul>
    </ul>
    <div id="comments">
        <?php
            $sql="SELECT `nam`,`message` 
            FROM `comments`
            WHERE `topic`='$topic'
            ORDER BY `id`;";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<div><p>".$row['nam']."</p><p>".$row['message']."</p></div>";
            }
        ?>
    </div>
    <div id="post">
        <form action="#" id="commen">
            <input type="text">
            <input type="submit" value="post">
        </form>
    </div>
    <script src="come.js?v=<?php echo time();?>"></script>
</body>
</html>