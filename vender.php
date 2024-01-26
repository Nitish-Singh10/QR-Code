<!-- index.php -->
<?php
include 'database.php';
session_name("session2");
session_start();
$user_id = $_SESSION['user_id'];
if (isset($user_id) == true) {
$query = "SELECT * FROM visiter
JOIN qr_scanned ON qr_scanned.user_id = visiter.UniqueID
WHERE qr_scanned.vender_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <title>Scan Data</title>
</head>
<body>
    <h1 style="text-align:center;">Scan Data</h1>

   <a href="./scanner.php"><button style="width: 9rem;font-size: larger;font-weight: 600; margin-bottom: 8px;">SCAN QR</button></a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
            </tr>
        </thead> 
        <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "</tr>";
            }
    echo ' </tbody>
    </table>
    <script>let table = new DataTable("#myTable");</script> 
    <a href="logoutv.php">Logout</a>

    <script>
        function scanData() {
            // Add your scanning logic here
            alert("Scanning data...");
        }
    </script>
</body>
</html>';}
else {
    header('location:loginv.php');
}
?>

