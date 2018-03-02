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

function educational_background($userid,$level){
    $db=connect();
    $sql="select * from educational_background where userid=? and level=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($userid,$level));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}

function childrens($userid){
    $db=connect();
    $sql="select * from children where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($userid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

if(isset($_POST['userid'])){
    $_SESSION['userid'] = $_POST['userid'];
}
$user = personal_information($_SESSION['userid']);
$family_background = family_background($_SESSION['userid']);
$educational_background1 = educational_background($_SESSION['userid'],1);
$educational_background2 = educational_background($_SESSION['userid'],2);
$educational_background3 = educational_background($_SESSION['userid'],3);
$educational_background4 = educational_background($_SESSION['userid'],4);
$childrens = childrens($_SESSION['userid']);

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

