<?php

include('phpqrcode/qrlib.php');
require_once('config.php');

function generateUniqueId($length = 5) {
    include "./config.php";
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $maxAttempts = 10; // Maximum attempts to generate a unique ID

    for ($attempt = 0; $attempt < $maxAttempts; $attempt++) {
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Combine timestamp and random string to create a unique ID
        $timestamp = time();
        $uniqueId = $timestamp . $randomString;

        // Check if the generated ID already exists in the database
        $queryCheck = "SELECT * FROM registration WHERE UniqueID = '$uniqueId'";
        $resultCheck = $mysqli->query($queryCheck);

        if ($resultCheck->num_rows === 0) {
            return $uniqueId; // Return the unique ID if it's not found in the database
        }
    }

    // If maximum attempts reached, throw an error or handle it as needed
    throw new Exception("Unable to generate a unique ID after $maxAttempts attempts");
}

// Getting Values from Form
$Name = $_POST['Name'];
$Designation = $_POST['Designation'];
$NOC = $_POST['NOC'];
$Address = $_POST['Address'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];

// Generate a unique ID using the function
try {
    $uniqueId = generateUniqueId();

    // Check uniqueness of email and phone
    $queryCheck = "SELECT * FROM registration WHERE Email = '$Email' OR Phone = '$Phone' OR UniqueID = '$uniqueId'";
    $resultCheck = $mysqli->query($queryCheck);

    if ($resultCheck->num_rows > 0) {
        header('location:index.php?msg=Email, Phone, or ID already exists');
        exit();
    }

    $pname = $uniqueId;
    $path = 'image/';
    $file = $path . $Name . ".png";

    $ecc = 'L';
    $pixel_Size = 10;
    $frame_Size = 10;

    $query = "INSERT INTO registration VALUES('', '$Name', '$Designation', '$NOC', '$Address', '$Phone', '$Email', '$file','','','','$uniqueId')";
    if ($mysqli->query($query) === true) {
        Qrcode::png($pname, $file, $ecc, $pixel_Size, $frame_Size);
        header('location:index.php?msg=data added successfully');
    } else {
        throw new Exception("Database Error: " . $mysqli->error);

        // header('location:index.php?msg=data failed');
    }
} catch (Exception $e) {
    header('location:index.php?msg=' . $e->getMessage());
}
?>
