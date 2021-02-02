<?php
session_start();  //start session
require"connection.php";  //database connection
require"navbar.php";
?>

<title>LOGIN</title>
    <div class="container h-100">
    <div class="row h-100 align-items-center">
	<div class="col-xl-5 col-lg-6 col-md-8 pr-0 pl-0 bg-light mx-auto">
    <h1 class="text-white bg-secondary mb-0 pb-2 pt-2 rounded-top text-center">LOGIN</h1>
    <div id="error"></div>
    <div class="form-group col-md-12 pt-4">
        <input type="text" name="email" class="form-control" id="email" placeholder="Email Id">
        <span id="emailErr" class="error"><?php if(isset($_POST["submit"])){ echo $emailErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
        <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Password">
        <span id="pass1Err" class="error"><?php if(isset($_POST["submit"])){ echo $passErr; } ?></span>
    </div>
    <div class="form-group col-md-12">
	    <button type="submit" class="btn btn-primary form-control" name="submit" id="button">Login</button>
	</div>
    <p class="text-center">New User? <a href="register.php">Register</a></p>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#button').click(function(){
            var email = $("#email").val();
            var pass1 = $("#pass1").val();
                $.ajax({
                type:"POST",
                url:"check_login.php",
                data: {
                    "email":email,
                    "pass1":pass1
                },
                success:function(response){
                    if(response==0){
                        $('#error').html('<div class="error text-danger"><span>Invalid Login Credentials</span></div>');
                    }
                    else if(response==1){
                       location.href="logout.php";
                    }
                    
                }
            });
            });
        });
    </script>
 