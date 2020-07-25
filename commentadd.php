<?php
    $servername="localhost";
    $username="id14456134_root";
    $password="Aayushairan799@gmail.com";
    $database="id14456134_users";
    $conn= mysqli_connect($servername,$username,$password,$database);
    echo $_GET['message'];
    $message=$_GET['message'];
    $name=$_GET['name'];
    $topic=$_GET['topic'];
    $sql="INSERT INTO comments(`topic`,`message`,`nam`)
    VALUES('$topic','$message','$name');";
    mysqli_query($conn,$sql);
?>
