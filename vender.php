<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the QR code data from the AJAX request
    $qrCodeData = $_POST['qrCode'];

    echo "Received QR Code Data: $qrCodeData";
} else {
    // Handle invalid requests
    http_response_code(400);
    echo "Invalid request method";
}
?>
