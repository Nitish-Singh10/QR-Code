<?php
include("config.php");
session_start();

if (isset($_SESSION['user_name'])) {
    // Welcome message and logout link
    echo '<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
              <title>Admin Page</title>';
              include "./script.php";

              
    echo      '</head>
          <body>
              <h3>Welcome ' . $_SESSION['user_name'] . '</h3>
              <p><a href="Logout.php">Log Out</a></p>

              <div class="col-md-2"></div>
              <div class="col-md-8">
                  <h1>QR Code List</h1><br><br>
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
                      <tbody>';

    // Switch based on session data
    switch ($_SESSION['type']) {
        case 'admin':
            $query = "SELECT * FROM registration";
            break;
        case 'registrationdesk':
            $pcid = $_SESSION['no'];
            $query = "SELECT * FROM registration WHERE pcid = $pcid";

            break;
        default:
            // Handle default case or exit gracefully
            exit("Invalid session data");
    }
    // echo $query;

    // Execute and display table rows
    if ($result = $mysqli->query($query)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                echo '<tr>
                          <td>' . $row->Id . '</td>
                          <td>' . $row->Name . '</td>
                          <td>' . $row->Designation . '</td>
                          <td>' . $row->NOC . '</td>
                          <td>' . $row->AOC . '</td>
                          <td>' . $row->Phone . '</td>
                          <td>' . $row->Email . '</td>
                          <td><img src="' . $row->OR . '" width="50px" height="50px"></td>
                          <td><a href="Try.php">Download QR</a></td>
                      </tr>';
            }
        }
    }

    // Close HTML tags
    echo '        </tbody>
                  </table>
              </div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          </body>
          </html>';
} else {
    header("location: login.php");
    exit;
}
?>
