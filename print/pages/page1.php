<?php

$pdf->SetFont('Arial','B',15);
$pdf->SetX(3);
$pdf->Cell(210,320,'',1,0,'C');

$pdf->SetFont('Arial','BI',8);
$pdf->SetXY(3,12);
$pdf->Cell(0,0,'CS Form No. 212',0,0,'');

$pdf->SetFont('Arial','BI',8);
$pdf->SetXY(3,16);
$pdf->Cell(0,0,'Revised 2017',0,0,'');

$pdf->SetFont('Arial','B',15);
$pdf->SetXY(100,17);
$pdf->Cell(10,5,'PERSONAL DATA SHEET',0,0,'C');

$pdf->SetFont('Arial','BI',7);
$pdf->SetXY(3,27);
$pdf->Cell(0,0,'WARNING: Any misinterpretation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminals case/s against the person',0,0,'');

$pdf->SetFont('Arial','BI',7);
$pdf->SetXY(3,31);
$pdf->Cell(0,0,'concerned',0,0,'');

$pdf->SetFont('Arial','BI',7);
$pdf->SetXY(3,35);
$pdf->Cell(0,0,'READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.',0,0,'');

$pdf->SetFont('Arial','',7);
$pdf->SetXY(3,38);
$pdf->Cell(0,0,'Print legibly. Tick appropriate boxes ( ',0,0,'');
$pdf->Rect(46, 37, 3, 3, 'D');

$pdf->SetXY(50,38);
$pdf->Cell(0,0,'and use separate sheet if necessary. Indicate N/A if not applicable. (',0,0,'');

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(127,38);
$pdf->Cell(0,0,'DO NOT ABBREVIATE. ',0,0,'');

$pdf->SetFont('Arial','',7);
$pdf->Rect(135, 37, 3, 3, 'D');
?>