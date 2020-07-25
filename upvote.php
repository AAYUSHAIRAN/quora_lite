<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
    $conn= mysqli_connect($servername,$username,$password,$database); 
    $name=$_GET['name'];
    $topic=$_GET['topic'];
    echo "updated";

    $sql="UPDATE `votes`
    SET `vote`='1'
    WHERE `topic`='$topic' AND `id`='$name';";
    mysqli_query($conn,$sql);

    $sql="UPDATE `topics`
    SET `upvote`=`upvote`+ 1
    WHERE `topic`='$topic' ;";
    mysqli_query($conn,$sql);

    $sql="UPDATE `topics`
    SET `downvote`=`downvote`-1
    WHERE `topic`='$topic' ;";
    mysqli_query($conn,$sql);
?>  