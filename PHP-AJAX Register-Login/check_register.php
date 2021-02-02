<?php
session_start(); //start the session
require"connection.php"; //databse connection
// if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $pass1=md5($_POST["pass1"]);
    $state=$_POST["state"];
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    
    
        $chkemail = $conn->query("SELECT email FROM user WHERE email='$email'"); //check if email already exist
        $emailcount = mysqli_num_rows($chkemail); 
        if(!$emailcount){
            $sql = "INSERT INTO user (name, mobile, email, password, state, city, pincode) 
            VALUES ('$name', '$mobile', '$email', '$pass1', '$state', '$city', '$pincode')";
            $result = $conn->query($sql);
            echo"1";
        }
        else{
            echo"0";
        }
    
// }    
?>
