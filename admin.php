<?php
session_name("session1");
session_start();
error_reporting(0);
include("database.php");
$admin_name = $_SESSION['admin_name'];
$admin_no = $_SESSION['admin_no'];
if (isset($admin_name) == true) {
    echo '<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href="admin.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
              <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
              <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
              <title>Admin Page</title>
          </head>';
              
    echo '<body>
          <h3>Welcome ' . $admin_name . '</h3>
              <table id="myTable" class="display">
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
                          <th>Download QR</th>
                      </tr>
                  </thead>
                  <tbody>';
    if($admin_no == 0){
        $query = "SELECT * FROM visiter";
    }
    else{
        $query = "SELECT * FROM visiter WHERE admin = $admin_no";
    }
    if ($result = $conn->query($query)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                echo '<tr>
                          <td>' . $row->NO . '</td>
                          <td>' . $row->Name . '</td>
                          <td>' . $row->Designation . '</td>
                          <td>' . $row->NOC . '</td>
                          <td>' . $row->AOC . '</td>
                          <td>' . $row->Phone . '</td>
                          <td>' . $row->Email . '</td>
                          <td><img src="'. $row->QR . '" width="50px" height="50px"></td>
                          <td><a href="Id.php?id='.$row->NO.'">Download QR</a></td>
                      </tr>';
            }
        }
    }

    echo '</tbody>
          </table>   
          <script>let table = new DataTable("#myTable");</script> 
          <p><a href="logout.php">Log Out</a></p>  
      </body>
      </html>';



} else {
    header('location:login.php');
}
?>