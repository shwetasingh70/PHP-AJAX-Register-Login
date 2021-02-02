<?php
session_start();  //start session
require "connection.php";  //database connection
require"navbar.php";
if(!isset($_SESSION["email"])){
    echo"<script type='text/javascript'>alert('Login first');</script>";
    header("Location:login.php");
}
if(isset($_POST["logout"])){
    session_destroy();
    header("Location:login.php");
}
?>

<title>HOME</title>
    <div class="container h-100">
    <div class="row h-100 align-items-center">
	<div class="col-xl-5 col-lg-6 col-md-8  mx-auto">
    <table class="table bg-light text-center">
        <tr>
            <td colspan="3"><h1><?php echo "Welcome " .$_SESSION["name"]; ?></h1></td>
        </tr>
        <tr>
            <td ><b>Your Details</b></td>
        </tr>
        <tr>
            <td>Mobile No</td>
            <td>:</td>
            <td><?php echo $_SESSION["mobile"]; ?></td>
        </tr>
        <tr>
            <td>Email Id</td>
            <td>:</td>
            <td><?php echo $_SESSION["email"]; ?></td>
        </tr>
        <tr>
            <td>State</td>
            <td>:</td>
            <td><?php echo $_SESSION["state"]; ?></td>
        </tr>
        <tr>
            <td>City</td>
            <td>:</td>
            <td><?php echo $_SESSION["city"]; ?></td>
        </tr>
        <tr>
            <td>Pincode</td>
            <td>:</td>
            <td><?php echo $_SESSION["pincode"] ?></td>
        </tr>
    </table>
    <div class="col text-center">
    <form name="f1" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <button type="submit" name="logout" class="btn btn-primary text-center">Logout</button>
    </form>
    </div>
</div>
</div>
</div>
