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
    $aim = $_SESSION['mail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="topic.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <div class="top">
        <div >
            <?php
            $sql="SELECT `username`,`position`
            FROM `login` 
            WHERE `email`='$aim';";
            $result=mysqli_query($conn,$sql);
            $a= mysqli_num_rows($result);
            $rows=mysqli_fetch_row($result);
            $name=$rows[0];
            $position=$rows[1];
            echo "hii there,".$rows[0];
            ?>
        </div>
        <div> <a href="logout.php">log-out</a></div>
    </div>
    <span><?php echo $aim ?></span>
    <span><?php echo $position ?></span>
    <div id="add" > <button>add topic </button></div>
    <ul class="topics">
        <?php
        $sql="SELECT * FROM `topics`;";
        $result=mysqli_query($conn,$sql);
        $a=mysqli_num_rows($result);
        while($row=mysqli_fetch_assoc($result)){
            echo "<ul><li>".$row['topic']."</li><li>".$row['subject']."</li><li>";

            $top= $row['topic'];
            $sq="SELECT `vote` FROM `votes`
                WHERE `id`='$aim' AND `topic`='$top' ";
            
            $resp=mysqli_query($conn,$sq);
            $vote=mysqli_num_rows($resp);
            if(mysqli_num_rows($resp)==0)
            {
                echo "<button><i class='fa fa-thumbs-o-up fa-lg' aria-hidden='true'>".$row['upvote']."</i></button>
                    <button><i class='fa fa-thumbs-o-down fa-lg' aria-hidden='true'>".$row['downvote']."</i></button>";
            }

            else if(mysqli_num_rows($resp)>0){
                $vote=mysqli_fetch_row($resp);
                if($vote[0]==1)
                {
                    echo "<button><i class='fa fa-thumbs-o-up fa-lg vote' aria-hidden='true'>".$row['upvote']."</i></button>
                        <button><i class='fa fa-thumbs-o-down fa-lg' aria-hidden='true'>".$row['downvote']."</i></button>";
                }

                else
                {
                    echo "<button><i class='fa fa-thumbs-o-up fa-lg' aria-hidden='true'>".$row['upvote']."</i></button>
                        <button><i class='fa fa-thumbs-o-down fa-lg vote' aria-hidden='true'>".$row['downvote']."</i></button>";
                }
            }

            echo "<button><a href='comments.php?topic=".$row['topic']."&subject=".$row['subject']."'><i class='fa fa-comment-o fa-lg' aria-hidden='true'></a></i></button>";
            if($position=="admin")
            {
                echo "<button><i class='fa fa-pencil fa-lg' aria-hidden='true'></i></button>
                <button><i class='fa fa-trash-o fa-lg' aria-hidden='true'></i></button></li></ul>";
            }
            else
            {
                echo "</li></ul>";
            }      
        }
        ?>
    </ul> 
    <form id="form1">h
        <fieldset>
            <legend>form</legend>
            <label>
                topic:<br/> <textarea rows="5" cols="60" name="topic"></textarea>
            </label><br />
            <label >
                subject:<br /><textarea rows="12" cols="60" name="subject"></textarea>
            </label><br />
            <a href="#">back</a>
            <input type="submit" value="submit">
        </fieldset>
    </form>
    <form id="edit">
        <fieldset>
            <label >
                subject:<br /><textarea rows="12" cols="60"></textarea>
            </label><br />
            <a href="#">back</a>
            <input type="submit" value="submit">
        </fieldset>
    </form>
    <script src="e.js?v=<?php echo time();?>"></script>
</body>
</html>