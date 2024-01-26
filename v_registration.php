<?php
include('phpqrcode/qrlib.php');
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Vendor Registration</title>
</head>
<body>
    <div class="container">
        <header>Vender Registration</header>
        <form action="" method="post">
            <div class="main">
                <div>
                    <span>Fill This Form and Collect your Id</span>
                </div>
                <div class="field">
                    <div class="input-field">
                        <label>Full Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="input-field">
                        <label>Designation</label>
                        <input type="text" name="Designation" required>
                    </div>
                    <div class="input-field">
                        <label>Name Of Shop</label>
                        <input type="text" name="NOS" required>
                    </div>
                    <div class="input-field">
                        <label>Description</label>
                        <input type="text" name="Description" required>
                    </div>
                    <div class="input-field">
                        <label>Phone No</label>
                        <input type="text" name="Phone" required>
                    </div>
                    <div class="input-field">
                        <label>Email Id</label>
                        <input type="text" name="Email" required>
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $Designation = $_POST['Designation'];
    $NOS = $_POST['NOS'];
    $Description = $_POST['Description'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];

    $pname = "Name:- $name." . `<br>` .
        "Designation:- $Designation" . `<br>` .
        "Name of Company:- $NOS." . `<br>` .
        "Address:- $Description." . `<br>` .
        "Phone:- $Phone." . `<br>` .
        "Email:- $Email";

    $path = 'image1/';
    $file = $path.uniqid().".png";

    $ecc = 'L';
    $pixel_Size = 10;
    $frame_Size = 10;

    $sql = "INSERT INTO vender VALUES (NULL, '$name', '$Designation', '$NOS', '$Description', '$Phone', '$Email','$file','111')";
    if ($conn->query($sql) == true) {
        Qrcode::png($pname, $file, $ecc, $pixel_Size, $frame_Size);
        header("location:v_registration.php?msg=data added Successfully");
    } else {
        header("location:v_registration.php?msg=data added Successfully");
    }
}
?>
