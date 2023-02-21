<?php
    $servername="localhost";
    $name="root";
    $password="";
    $dbname=""; // database name
    $conn = new mysqli($servername,$name,$password,$dbname);
    if($conn->connect_error){
        die("connect fail".$conn->connect_error);
    }
?>
