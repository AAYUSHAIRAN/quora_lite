<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
   $conn= mysqli_connect($servername,$username,$password,$database); 
   $topic=$_GET['topic'];
   $subject=$_GET['subject'];
   echo $subject;
   $sql="UPDATE `topics`
   SET `subject`='$subject'
   WHERE `topic`='$topic';";
   mysqli_query($conn,$sql);
?>