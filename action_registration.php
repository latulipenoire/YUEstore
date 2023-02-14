<?php
    require "conn.php";
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $re_password = isset($_POST['re_password'])?$_POST['re_password']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";

    if($password == $re_password) {
 
        $sql_select="SELECT username FROM user WHERE username = '$username'";
        $result = mysqli_query($conn,$sql_select);
        $row = mysqli_fetch_array($result);    
        if($username == $row['username']) {   
            echo "<script language='javascript'>; 
            alert('Username already exists!'); 
            </script>";              
            header("refresh:0;url=register.php"); 

        } else {
            $sql_insert = "INSERT INTO User(username,email,password) VALUES('$username','$email','$password')";
 
            mysqli_query($conn,$sql_insert);
            echo "<script language='javascript'>; 
            alert('registration success, go to LOGIN!!'); 
            </script>";              
            header("refresh:0;url=login.php"); 
        }
        mysqli_close($conn);
    } else {

        echo "<script language='javascript'>; 
        alert('The password does not match the repeated password!!'); 
        </script>";              
        header("refresh:0;url=register.php"); 
    }

?>