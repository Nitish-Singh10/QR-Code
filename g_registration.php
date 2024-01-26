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
    <title>Visiter Registration</title>
</head>

<body>
    <?php
    if (isset($_GET['by'])) {
        $by = $_GET['by'];
    }
    ?>
    <div class="container">
        <header>Visitor Registration</header>
        <form action="" method="post">
            <div class="main">
                <div class="    ">
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
                        <label>Name Of Company</label>
                        <input type="text" name="NOC" required>
                    </div>
                    <div class="input-field">
                        <label>Address Of Company</label>
                        <input type="text" name="AOC" required>
                    </div>
                    <div class="input-field">
                        <label>Phone No</label>
                        <input type="text" name="Phone" required>
                    </div>
                    <div class="input-field">
                        <label>Email Id</label>
                        <input type="text" name="Email" required>

                    </div>
                    <?php
                    if (isset($by)) {
                        echo '<input hidden type="text" name="by"  value="' . $by . '"required>';
                    }
                    ?>
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
    function generateUniqueId($name) {
    
        include "database.php";
            $namePrefix = substr(str_replace(' ', '', strtoupper($name)), 0, 3);
            
            $timestamp = date('dHis', strtotime('+5 hours 30 minutes'));
            
            $uniqueId = $timestamp . $namePrefix;
        
            $queryCheck = "SELECT * FROM visiter WHERE UniqueID = '$uniqueId'";
            $resultCheck = $conn->query($queryCheck);
        
            if ($resultCheck->num_rows === 0) {
                return $uniqueId;
            } else {
                throw new Exception("Generated ID already exists in the database");
            }
        }

    $name = $_POST['name'];
    $Designation = $_POST['Designation'];
    $NOC = $_POST['NOC'];
    $AOC = $_POST['AOC'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];

    $pname = generateUniqueId($name);

    $path = 'image/';
    $file = $path.$pname.".png";

    $ecc = 'L';
    $pixel_Size = 10;
    $frame_Size = 10;

    $sql = "INSERT INTO visiter VALUES (NULL, '$name', '$Designation', '$NOC', '$AOC', '$Phone', '$Email','$file', '$by','$pname')";
    if ($conn->query($sql) == true) {
        Qrcode::png($pname, $file, $ecc, $pixel_Size, $frame_Size);
        header("location:g_registration.php?by=$by");
    } else {
        header("location:g_registration.php?by=$by");
    }
}
?>