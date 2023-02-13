<?php
    session_start();
    // connect database
    require "conn.php";
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";

    // validate username and password
    // there are 2 kindle of username ID, one is normal username, another is administrator 
    if(!empty($username)&&!empty($password)) {
        
        $sql= "SELECT username,password FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result); 

        if($username==$row['username']&&$password==$row['password']) {
            $_SESSION['user']=$username;
 
            $ip = $_SERVER['REMOTE_ADDR'];
            $date = date('Y-m-d H:m:s');

            // take record for every time login of username
            $info = sprintf("Current visiting user:%s,IP address:%s,Time:%s \n",$username, $ip, $date);
            $sql_logs = "INSERT INTO Logs(username,ip,date) VALUES('$username','$ip','$date')";

            $f = fopen('./logs/'.date('Ymd').'.log','a+');

            fwrite($f,$info);
            fclose($f);

            // validated username ID, normal or administrator 
            if($username == 'admin'){
                echo "<script>alert('Login successfull!');
                window.location.href='product_list_admin.php';
                </script>" ;

            }else{
            echo "<script language='javascript'>; 
            alert('Login successfull!'); 
            </script>";   
            header("refresh:0;url=product.php");
            }

        }else {
            echo "<script language='javascript'>; 
            alert('username or password is wrong!'); 
            </script>";
            header("refresh:0;url=login.php");
        }
    }else {
        echo "<script language='javascript'>; 
        alert('username or password is not null!'); 
        </script>"; 
        header("refresh:0;url=login.php");
    }
    // close connection
    mysqli_close($conn);
?>
