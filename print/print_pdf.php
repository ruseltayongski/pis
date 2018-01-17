<?php
/**
 * Created by PhpStorm.
 * User: rtayong
 * Date: 1/17/2018
 * Time: 2:26 PM
 */

include_once 'fpdf.php';


class PDF extends FPDF
{
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','LEGAL');
$pdf->AliasNbPages();

$pdf->SetFont('Times','',12);
$pdf->AddPage();
include 'pages/page1.php';

$pdf->Output();

?>