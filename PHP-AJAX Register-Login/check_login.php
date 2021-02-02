<?php
session_start(); //start session
require"connection.php";

    $email=$_POST["email"];
    $pass1=$_POST["pass1"];
    $password = md5($pass1);
   
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $query=$conn->query($sql);
    $count=mysqli_num_rows($query);
    if($count==1){
        while($row=$query->fetch_assoc()){
            $_SESSION["name"]=$row["name"];
            $_SESSION["mobile"]=$row["mobile"];
            $_SESSION["email"]=$row["email"];
            $_SESSION["state"]=$row["state"];
            $_SESSION["city"]=$row["city"];
            $_SESSION["pincode"]=$row["pincode"];
        }
    }
    if($count==1){
        echo"1";
    }
    else{
        echo"0";
    }
?>