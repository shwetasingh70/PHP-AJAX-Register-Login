<?php
session_start();  //start session
require "connection.php";  //database connection
$view_query = "SELECT * FROM user ORDER BY id DESC";
$view_result = $conn->query($view_query);
        
        while($data = $view_result->fetch_assoc())
        {   
            $output[]=$data;
        }
    echo json_encode($output);
    
    ?>
    