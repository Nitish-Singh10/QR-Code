<?php
    include("library/tcpdf.php");
    $pdf = new TCPDF('p','mm','3*2');
    $pdf->AddPage();
    $pdf->Output();
?>