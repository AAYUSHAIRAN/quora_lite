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
                <p>SIGN-IN</p><br />
                <label>
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="user-name" name="name" required>
                </label><br />
                <label>
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" placeholder="email" name="email" required>
                </label><br />
                <label>
                    <i class="fa fa-key icon"></i>
                    <input type="password" placeholder="password" name="password" required>
                </label><br />
                <label>
                    <i class="fa fa-key icon"></i>
                    <input type="password" placeholder="re-type password" name="re-password" required><br />
                </label><br />
                <input type="radio" name="position" value="user">user <input type="radio" name="position" value="admin">admin<br /> 
                <button><a href="login.php">back</a></button>
                <input type="submit" value="register">
            </form>
        </div>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            //password length greater than 10
            if(strlen($_POST['password'])>=10){
                //if both the password are same   
                if($_POST['password']==$_POST['re-password'])
                {
                    $password= $_POST['password'];
                    $name= $_POST['name'];
                    $email=$_POST['email'];
                    $position=$_POST['position'];
                    //validation of email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error="*enter the valid email address";
                    }
                    else
                    {
                        $sql= "INSERT INTO `login` VALUES('$name','$email','$password','$position');";
                        if(mysqli_query($conn,$sql))
                        {
                            session_start();
                            $_SESSION['mail']= $email;
                            $error="";
                            header("Location: topic.php");
                        }
                        else
                        {
                            $error="*try different email address";
                        }
                    }
                }
                else
                {
                    $error="*password must match";
                }
            }
            else
            {
                //error
                $error="*password length must be >=10";
            }
        }?>
        <p id="error"><?php echo $error; ?></p>
    </div>

</body>
</html>