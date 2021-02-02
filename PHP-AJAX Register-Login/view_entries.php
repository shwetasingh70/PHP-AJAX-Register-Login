<?php
session_start();  //start session
require "connection.php";  //database connection
require"navbar.php";

?>


<title>View Entry</title>
    <p id="data"></p>
    <div id="result" >
    <div class='container'>
    <div class='row bg-light'>
    <table class='table table-hover table-fixed'>
    <thead>
        <tr>
            <td align="center"> <b>Name</b></td>
            <td align="center"><b>Mobile No</b></td>
            <td align="center"><b>Email Id</b></td>
            <td align="center"><b>State</b></td></td>
            <td align="center"><b>City</b></td>
            <td align="center"><b>Pincode</b></td>
            <td align="center"><b>Created At</b></td>
        </tr>
    <tbody></tbody>
    </thead>
    </table> 
    </div>
    </div>
    </div>

    <div class="col text-center">
        <form name="f1" method="post" action="register.php" class="mx-auto"> 
            <button type="submit" name="add_records" class="btn btn-primary text-center">Add more Entries</button>
        </form>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
        $("#data").html(function() {                

        $.ajax({    
            type: "GET",
            url: "receive_entries.php",             
            dataType: 'JSON',                 
            success: function(response){                    
                console.log(response);
                var length = response.length;
            //    var result_json = JSON.parse(JSON.stringify(response));
            //    console.log(result_json);
               
                for(var i=0; i<length; i++){
                   var name = response[i].name;
                   var mobile = response[i].mobile;
                   var email = response[i].email;
                   var state = response[i].state;
                   var city = response[i].city;
                   var pincode = response[i].pincode;
                   var created_at = response[i].created_at;

                   var table = "<tr>" +
                   "<td align='center'>" +name +"</td>" +
                   "<td align='center'>" +mobile +"</td>" +
                   "<td align='center'>" +email +"</td>" +
                   "<td align='center'>" +state +"</td>" +
                   "<td align='center'>" +city +"</td>" +
                   "<td align='center'>" +pincode +"</td>" +
                   "<td align='center'>" +created_at +"</td>" +
                   "</tr>";
                   $(".table tbody").append(table);

               }
            }

        });
    });
    });
    </script>
 
