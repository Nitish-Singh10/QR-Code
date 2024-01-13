<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // Validate input
    if (empty($email) || empty($password) || is_numeric($email)) {
        echo "<script>alert('Invalid Input');</script>";
        exit;
    }

    // Prepare and execute the SQL query
    $query = "SELECT * FROM admin WHERE Email = ? LIMIT 1";
    $stmt = mysqli_prepare($mysqli, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result && $user_data = mysqli_fetch_assoc($result)) {
            // Compare passwords directly (assuming plain text)
            if ($user_data['Password'] === $password) {
                $_SESSION['user_name'] = $user_data['Fname'];
                $_SESSION['type'] = $user_data['type']; 
                $_SESSION['no'] = $user_data['no']; 


                header("location: admin.php");
                exit;
            } else {
                echo "<script>alert('Wrong User Name or Password');</script>";
            }
        } else {
            echo "<script>alert('Wrong User Name');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error in preparing statement');</script>";
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
            <input type="password" name="Password" required>
            <input type="submit" value="LOGIN IN">
        </form>
        <p>Not have an Account <a href="Signup.php">Sign Up</a></p>
    </div>
</body>
</html>
