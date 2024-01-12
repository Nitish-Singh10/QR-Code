<?php
session_start();
include("config.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if(!empty($Email) && !empty($Password) && !is_numeric($Email)){
        $query = "INSERT INTO vender VALUES ('', '$Fname', '$Lname', '$Gender', '$Address', '$Phone', '$Email', '$Password', '')";
        mysqli_query($mysqli,$query);
        echo "<script>alert('Successfully Register');</script>";
    }
    else{
        echo "<script>alert('Please Enter some valid information');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Try.css">
    <title>Sign In</title>
</head>
<body>
<div class="main">
        <h2>Sign Up</h2>
    <form method="POST">
        <label for="name">First Name</label>
        <input type="text" name="Fname" required>
        <label for="Lname">Last Name</label>
        <input type="text" name="Lname" required>
        <label for="Gender">Gender</label>
        <input type="text" name="Gender" required>
        <label for="Address">Address</label>
        <input type="text" name="Address" required>
        <label for="Phone">Phone</label>
        <input type="text" name="Phone" required>
        <label for="Email">Email</label>
        <input type="text" name="Email" required>
        <label for="Password">Password</label>
        <input type="text" name="Password" required>
        <input type="submit" value="SUBMIT">
    </form>
    <p>Already has an Account <a href="Login.php">Login In</a></p>
</div>
</body>
</html>