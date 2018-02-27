<?php
session_start();

function connect(){
    return new PDO("mysql:host=localhost;dbname=pis",'root','');
}

function personal_information($id){
    $db=connect();
    $sql="select * from personal_information where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}
function family_background($id){
    $db=connect();
    $sql="select * from family_background where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}
function educational_background($id){
    $db=connect();
    $sql="select * from educational_background where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

if(isset($_POST['userid'])){
    $_SESSION['userid'] = $_POST['userid'];
}
$user = personal_information($_SESSION['userid']);
$family_background = family_background($_SESSION['userid']);
$educational_background = educational_background($_SESSION['userid']);

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

