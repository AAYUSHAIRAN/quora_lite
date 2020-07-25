<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
    $conn= mysqli_connect($servername,$username,$password,$database); 
    $name=$_GET['name'];
    $topic=$_GET['topic'];
    $downvote=$_GET['downvote'];
    echo $downvote;
    $down=-$downvote;
    if($downvote==-1)
    {
        $sql="DELETE FROM `votes`
        WHERE `id`='$name' AND `topic`='$topic';";
        mysqli_query($conn,$sql);
        
        $sql="UPDATE `topics`
        SET `downvote`=`downvote`-1
        WHERE `topic`='$topic' ;";
        mysqli_query($conn,$sql);    
    }
    else
    {
        $sql="INSERT INTO votes(`topic`,`id`,`vote`)
        VALUES ('$topic','$name','$down');";
        mysqli_query($conn,$sql);

        $sql="UPDATE `topics`
        SET `downvote`=`downvote`+1
        WHERE `topic`='$topic' ;";
        mysqli_query($conn,$sql);

    }
?>