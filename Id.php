<?php
    session_name("session1");
    session_start();
    error_reporting(0);
    include("library/tcpdf.php");
    include("database.php");
    $admin_name = $_SESSION['admin_name'];
    if (isset($admin_name) == true){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $query = "SELECT * FROM visiter WHERE NO = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator('Nitish Singh');
        $pdf->SetAuthor('Nitish Singh');
        $pdf->SetTitle('QR ID CARD');
        $pdf->SetSubject('ID CARD');
        $pdf->AddPage();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetTextColor(0, 0, 128);
        $pdf->Image($data['QR'], 50, 50, 50, 50, 'png');
        $namePosition = 50;
        $numberPosition = 50;

        $pdf->SetXY($namePosition, 110);
        $pdf->Cell(0, 10, 'Name:     ' . $data['Name'], 0, 1);

        $pdf->SetXY($numberPosition, 117);
        $pdf->Cell(0, 10, 'Number:   ' . $data['Phone'], 0, 1);
        $pdf->Output();
    }
    else{
        header('location:login.php');
    }
?>