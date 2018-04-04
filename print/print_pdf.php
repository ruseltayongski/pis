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

function educational_backgroundAll($id){
    $db=connect();
    $sql="select * from educational_background where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function education_type($id){
    $db=connect();
    $sql="select * from education_type where id=?";
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

$educational_background = educational_backgroundAll($_SESSION['userid']);

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
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

}

// Instanciation of inherited class
$pdf = new PDF('P','mm','LEGAL');
$pdf->AliasNbPages();

$pdf->SetFont('Times','',12);
/*$pdf->AddPage();
include 'pages/page1.php';*/
$pdf->AddPage();
include 'pages/page2.php';

$pdf->Output();

?>

