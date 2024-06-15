<?php
    require('../fpdf186/fpdf.php');

    $pdf = new FPDF('L','mm','Letter');
    $pdf->AddPage();
    
    $pdf->SetFont('Courier','B','16');
    $pdf->Cell(0,10,'Mi primer PDF con PHP',1,1,'C');

    
    $pdf->Cell(0,0,'QWERTYUIOPASDFGHJKLZXCVBNM',1,'L');
    $pdf->Output();
?>