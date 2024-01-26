<?php
session_name("session2");
session_start();
$user_id = $_SESSION['user_id'];
if (isset($user_id) == true) {
echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        #my-qr-reader {
            width: 80%;
            max-width: 300px;
        }

        #result {
            margin-top: 20px;
            font-size: 1.2rem;
        }

        #downloadLink {
            margin-top: 20px;
            display: none;
        }
    </style>
</head>

<body>
    <div id="my-qr-reader"></div>
    <div id="result"></div>
    <a id="downloadLink" download="qr_code_data.txt">Download QR Code Data</a>

    <script>
        const qrReader = new Html5Qrcode("my-qr-reader");

        qrReader.start(
            { facingMode: "environment" },
            {
                fps: 10,
                qrbox: { width: 250, height: 250 },
            },
            (qrCode, _error) => {
                console.log("QR Code detected:", qrCode);

                const resultElement = document.getElementById("result");
                resultElement.textContent = `QR Code Data: ${qrCode}`;
                window.location.href = "qrscan.php?qrCode=" + encodeURIComponent(qrCode);

            },
            (errorMessage) => {
                console.error(errorMessage);
            }
        );
    </script>
</body>

</html>';}
else{
    header('location:loginv.php');
}

?>