<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
    $conn= mysqli_connect($servername,$username,$password,$database); 
    echo $_GET['topic'];   
    $topic=$_GET['topic'];
    $subject=$_GET['subject'];
    $sql="INSERT INTO `topics` VALUES('$topic','$subject','0','0','0');";
    mysqli_query($conn,$sql);
?>