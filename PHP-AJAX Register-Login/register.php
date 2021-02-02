<?php
session_start();  //start session
// require "connection.php";  //database connection
require"navbar.php";
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $mobile=$_POST["mobile"];
    $email=$_POST["email"];
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    $nameErr=$mobileErr=$emailErr=$passErr=$stateErr=$cityErr=$pincodeErr="";
    $if_error = false;
   
    if(empty($name)){
        $nameErr="Name is required";
        $if_error=true;
    }
    else{
        $name = $_POST["name"]  ;
    }
    if(empty($mobile)){
        $mobileErr="Mobile no. is required";
        $if_error=true;
    }
    else if(!preg_match("/^[0-9]{10}$/", $mobile)){
        $mobileErr="Invalid mobile number";
        $if_error=true;
    }
    else{
        $mobile= $_POST["mobile"];
    }

    $chkemail = $conn->query("SELECT email FROM user WHERE email='$email'");
    $emailcount = mysqli_num_rows($chkemail); 
    if(empty($email)){
        $emailErr="Email is required";
        $if_error=true;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr="Invalid Email Id";
        $if_error=true;
    }
    else if($emailcount==1){ //check if email already exist
        $emailErr="Email Id already exists";
        $if_error=true;
    }
    else{
        $email=$_POST["email"];
    }

    if(empty($pass1)){
        $passErr="Password is required";
        $if_error=true;
    }    
    else if($pass1!=$pass2){
        $passErr="Passwords do not match";
        $if_error=true;
    }
    else{
        $pass1=md5($pass1); //encrypt password
    }
    if(empty($state)){
        $stateErr="State is required";
        $if_error=true;
    }
    else if(!preg_match("/^[a-zA-Z]*$/", $state)){
        $stateErr = "Only Characters allowed";
        $if_error=true;
    }
    else{
        $state=$_POST["state"];
    }
    if(empty($city)){
        $cityErr="City is required";
        $if_error=true;
    }
    else if(!preg_match("/^[a-zA-Z]*$/", $city)){
        $cityErr = "Only Characters allowed";
        $if_error=true;
    }
    else{
        $city=$_POST["city"];
    }
    if(empty($pincode)){
        $pincodeErr="Pincode is required";
        $if_error=true;
    }
    else if(!preg_match("/^[0-9]{6}$/", $pincode)){
        $pincodeErr="Invalid Pincode";
        $if_error=true;
    }
    else{
        $pincode= $_POST["pincode"];
    }
//     if($if_error==false){
//     //inserting into databse
//     $sql = "INSERT INTO user (name, mobile, email, password, state, city, pincode) 
//             VALUES ('$name', '$mobile', '$email', '$pass1', '$state', '$city', '$pincode')";
//     if($conn->query($sql)==TRUE){
//         header("Location:login.php");
//     }
//     else{
//         echo"error";
//     }
// }
    
}
?>

    <title>REGISTER</title>
    <div class="container h-100">
    <div class="row h-100 align-items-center">
	<div class="col-xl-5 col-lg-6 col-md-8 pr-0 pl-0 bg-light mx-auto">
    <h1 class="text-white bg-secondary mb-0 pb-2 pt-2 rounded-top text-center">REGISTER</h1>
    <!-- <div id="result"></div> -->
    <!-- <form name="f1" method="post"> -->
    <div class="form-group col-md-12 pt-4">
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        <span id="nameErr" class="error"><?php if(isset($_POST["submit"])){ echo $nameErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile No">
        <span id="mobileErr" class="error"><?php if(isset($_POST["submit"])){ echo $mobileErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="text" name="email" class="form-control" id="email" placeholder="Email Id">
        <span id="emailErr" class="error"><?php if(isset($_POST["submit"])){ echo $emailErr; } ?></span>
        <div id="result"></div>
    </div>
    <div class="form-group col-md-12">
        <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Password">
        <span id="pass1Err" class="error"><?php if(isset($_POST["submit"])){ echo $passErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Confirm Password">
        <span id="pass2" class="error"><?php if(isset($_POST["submit"])){ echo $passErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="text" name="state" class="form-control" id="state" placeholder="State">
        <span id="stateErr" class="error"><?php if(isset($_POST["submit"])){ echo $stateErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="text" name="city" class="form-control" id="city" placeholder="City">
        <span id="cityErr" class="error"><?php if(isset($_POST["submit"])){ echo $cityErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Pincode">
        <span id="pincodeErr" class="error"><?php if(isset($_POST["submit"])){ echo $pincodeErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
	    <button type="submit" class="btn btn-primary form-control" name="submit" id="button">Register</button>
	</div>
    <p class="text-center">Existing User? <a href="login.php">Login</a></p>
    <!-- </form> -->
  </div>
  </div>
  </div>
  <script type="text/javascript">

$(document).ready(function(){
    $("#button").click(function(){
        var chkerror = false;
        var regexp = /^[a-zA-Z\s]+$/;
        var mobregx = /^[0-9]{10}$/;
        var pinregx = /^[0-9]{6}$/;
        var emailregx = /^\S+@\S+\.\S+$/;
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();
        var pass1 = $("#pass1").val();
        var pass2 = $("#pass2").val();
        var state = $("#state").val();
        var city  = $("#city").val();
        var pincode = $("#pincode").val();
        $(".error").remove();

        //name validation
        if(name.length<1){
            $('#name').after('<span class="error text-danger">Name is required*</span>');
            chkerror = true;
        }
        else if(!regexp.test(name)){
            $('#name').after('<span class="error text-danger">Enter valid name</span>');
            chkerror = true;
        }

        //mobile validation
        if(mobile.length<1){
            $('#mobile').after('<span class="error text-danger">Mobile no is required*</span>');
            chkerror = true;
        }
        else if(!mobregx.test(mobile)){
            $('#mobile').after('<span class="error text-danger">Enter valid mobile No</span>');
            chkerror = true;
        }

        //email validation
        if(email.length<1){
            $('#email').after('<span class="error text-danger">Email is required*</span>');
            chkerror = true;
        }
        else if(!emailregx.test(email)){
            $('#email').after('<span class="error text-danger">Enter valid email</span>');
            chkerror = true;
        }
        
        //password validation
        if(pass1.length<1){
            $('#pass1').after('<span class="error text-danger">Password is required*</span>');
            chkerror = true;
        }
        if(pass2.length<1){
            $('#pass2').after('<span class="error text-danger">Confirm password is required*</span>');
            chkerror = true;
        }
        else if(pass1 != pass2){
            $('#pass2').after('<span class="error text-danger">Passwords do not match*</span>');
            chkerror = true;
        }

        //state validation
        if(state.length<1){
            $('#state').after('<span class="error text-danger">State is required*</span>');
            chkerror = true;
        }
        else if(!regexp.test(state)){
            $('#state').after('<span class="error text-danger">Enter valid state name</span>');
            chkerror = true;
        }

        //city validation
        if(city.length<1){
            $('#city').after('<span class="error text-danger">City is required*</span>');
            chkerror = true;
        }
        else if(!regexp.test(city)){
            $('#city').after('<span class="error text-danger">Enter valid city name</span>');
            chkerror = true;
        }

        //pincode validation
        if(pincode.length<1){
            $('#pincode').after('<span class="error text-danger">Pincode is required*</span>');
            chkerror = true;
        }
        else if(!pinregx.test(pincode)){
            $('#pincode').after('<span class="error text-danger">Enter valid pincode*</span>');
            chkerror = true;
        }
        if(chkerror==false){
            $.ajax({
                type:"POST",
                url:"check_register.php",
                data: {
                    "name":name,
                    "mobile":mobile,
                    "email":email,
                    "pass1":pass1,
                    "state":state,
                    "city":city,
                    "pincode":pincode
                },
                success:function(response){
                    if(response==0){
                        $('#result').html('<div class="error"><span class="text-danger">Email id already exists</span></div>');
                    }
                    else if(response==1){
                        location.href="login.php"
                    }
                   
                    
                }
            });
        }
    });  
    });
 </script>