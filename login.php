<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
    $conn= mysqli_connect($servername,$username,$password,$database);
    $error="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="user_style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <div id="top">
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <p>LOG-IN</p><br />
                <label>
                    <i class="fa fa-user icon"></i>
                    <input type="email" placeholder="email-id" name="email" required>
                </label><br />
                <label>
                    <i class="fa fa-key icon"></i>
                    <input type="password" placeholder="password" name="password" required>
                </label><br />
                <button><a href="user.php">create new</a></button>
                <input type="submit" value="submit">
            </form>
        </div>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $mail= $_POST["email"];
            $pass=$_POST["password"];
            $sql="SELECT `email` 
                FROM `login` 
                WHERE `email`= '$mail' AND `passwords`= '$pass' ;";
            $result=mysqli_query($conn,$sql);
            $a= mysqli_num_rows($result);
            if($a>0)
            {
                session_start();
                $_SESSION['mail']= $mail;
                $error="";
                header("Location: topic.php");
            }
            else
            {
                $error="*plz enter the corrrect details";
            }
        } 
        ?>
            <p id="error"><?php echo $error; ?></p>
    </div>
</body>
</html>