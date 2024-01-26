<?php
session_name("session2");
session_start();
$_SESSION["name"] = "2";
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Login Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #4070f4;
        }

        .container {
            position: relative;
            max-width: 500px;
            width: 100%;
            border-radius: 6px;
            padding: 30px;
            margin: 0 15px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .container header {
            position: relative;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .container form {
            position: relative;
            min-height: 250px;
            background-color: #fff;
        }

        .container form .field {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        form .field .input-field {
            display: flex;
            width: calc(100% - 15px);
            flex-direction: column;
            margin: 4px 0;
        }

        .input-field label {
            font-weight: 500;
            color: #2e2e2e;
        }

        input {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        input:is(:focus, :valid) {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .submit input {
            width: 150px;
            font-weight: 500;
            margin-top: 6px 0;
        }

        .submit input:hover {
            background-color: #4070f4;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>Login Vender</header>
        <form action="" method="post">
            <div class="field">
                <div class="input-field">
                    <label>Name</label>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class='input-field'>
                </div>
                <div class="submit">
                    <input type="submit" name="submit" value="LOGIN">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Password = $_POST['password'];
    if (!empty($Name) && !empty($Password)) {
        $que = "SELECT * FROM vender where Name='$Name' LIMIT 1";
        $data = mysqli_query($conn, $que);
        if ($data && mysqli_num_rows($data) > 0) {
            $fetch = mysqli_fetch_assoc($data);
            if ($fetch["Password"] == $Password) {
                $no = $fetch["NO"];
                $_SESSION['user_id'] = $no;
                $_SESSION['admin_name'] = $Name;
                header("location:vender.php");
            } else {
                echo "<script>alert('Wrong User Name and Password');</script>";
            }
        } else {
            echo "<script>alert('Wrong User Name and Password');</script>";
        }
    } else {
        echo "<script>alert('Invalid Entry');</script>";
    }
}
?>