<?php
session_start();
include("config.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if(!empty($Email) && !empty($Password) && !is_numeric($Email)){
        $query = "SELECT * FROM vender WHERE Email = '$Email' LIMIT 1";
        $result = mysqli_query($mysqli,$query);

        if($result){
            if($result && mysqli_num_rows($result)>0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['Password']==$Password){
                    header("location:admin.php");
                    die;
                }
            }
        }
        else{
            echo "<script>alert('Wrong User Name and Password');</script>";
        }
    }
    else{
        echo "<script>alert('Wrong User Name and Password');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Try.css">
    <title>Login In</title>
</head>
<body>
<div class="main">
        <h2>Login In</h2>
    <form method="POST">
        <label for="Email">Email</label>
        <input type="text" name="Email" required>
        <label for="Password">Password</label>
        <input type="text" name="Password" required>
        <input type="submit" value="LOGIN IN">
    </form>
    <p>Not have an Account <a href="Signup.php">Sign Up</a></p>
</div>
</body>
</html>