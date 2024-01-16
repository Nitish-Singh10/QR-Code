<?php

require_once 'vendor/autoload.php';

use Zxing\QrReader;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted

    // Handle image upload
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpFilePath = $_FILES['image']['tmp_name'];

        // Create a QR code reader instance
        $qrReader = new QrReader($tmpFilePath);

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
