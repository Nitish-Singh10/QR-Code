<?php
include("config.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Page</title>
</head>
<body>
    <h3>Welcome Admin</h3>
    <p><a href="Login.php">Log Out</a></p>


    <div class="col-md-2"></div>
    <div class="col-md-8">
            <h1>QR Code List</h1>
            <br>   
           
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Name of Company</th>
                        <th>Address of Company</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>QR CODE</th>
                      
                    </tr>
                </thead>
                <tbody>
                  <?php
                    require_once('config.php');
                   
                   $query="Select * from Registration";
                    
                    if($result = $mysqli->query($query)){
                        if($result->num_rows > 0){
                            while($row = $result->fetch_object()){
                                
                    ?>
                        <tr>
                                <td><?php echo $row->Id; ?></td>
                                <td><?php echo $row->Name; ?></td>
                                <td><?php echo $row->Designation ?></td>
                                <td><?php echo $row->NOC ?></td>
                                <td><?php echo $row->AOC ?></td>
                                <td><?php echo $row->Phone ?></td>
                                <td><?php echo $row->Email ?></td>
                                <td><img src='<?php echo $row->OR; ?>' width="50px" height="50px"></td>
                                <td><a href="Try.php">Download QR</a></td>
                        </tr>   
                        

                 <?php         
                            }
                       } 
                    }     
                  ?>
                </tbody>
            </table>
            
    </div>          
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>