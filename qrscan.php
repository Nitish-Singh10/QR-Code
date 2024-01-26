<?php
session_name("session2");
session_start();
include "database.php";
$venderid=$_SESSION['user_id'];
if(isset($venderid)==true){
if ($_GET['qrCode']) {
    // Get the QR code data from the AJAX request
    $qrCodeData = $_GET['qrCode'];
    // $venderid=$_SESSION['user_id'];
    echo ''.$venderid.''.$qrCodeData.'';
    $sql="INSERT into qr_scanned VALUES ('',$venderid,'$qrCodeData','','')";
    if ($conn->query($sql) === true) {
        // Qrcode::png($pname, $file, $ecc, $pixel_Size, $frame_Size);
        header('location:vender.php?msg=data added successfully');
    }
    // echo "Received QR Code Data: $qrCodeData";
} else {
    // Handle invalid requests
    http_response_code(400);
    echo "Invalid request method";
}}
else{
    header("location:loginv.php");
}
?>
