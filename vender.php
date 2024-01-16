<?php

require_once 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Zxing\QrReader;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted

    // Handle image upload
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpFilePath = $_FILES['image']['tmp_name'];

        // Use the QR code library to generate a QR code
        $qrCode = new QrCode();
        $qrCode->setText(file_get_contents($tmpFilePath));

        // Create a QR code reader instance
        $qrReader = new QrReader($qrCode->writeString());

        try {
            // Decode the QR code
            $text = $qrReader->text();

            // Output the result
            echo "QR Code Text: $text";
        } catch (Exception $e) {
            // Handle exceptions, if any
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error uploading image.";
    }
}
?>
