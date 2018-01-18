<?php
function connect(){
    return new PDO("mysql:host=localhost;dbname=pis",'root','');
}

function userid($id){
    $db=connect();
    $sql="select * from personal_information where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}

$user = userid(201400181);

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