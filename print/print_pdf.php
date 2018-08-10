<?php
session_start();

function connect(){
    return new PDO("mysql:host=localhost;dbname=pis",'root','');
}

function queryFetch($id,$table){
    $db=connect();
    $sql= "select * from ".$table." where userid=?";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($id));
    $row=$pdo->fetch();
    $db=null;

    return $row;
}

function queryFetchAll($id,$table){
    $db=connect();
    $sql="select * from ".$table." where userid=?";
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


if(isset($_POST['userid'])){
    $_SESSION['userid'] = $_POST['userid'];
}
$user = queryFetch($_SESSION['userid'],'personal_information');
$family_background = queryFetch($_SESSION['userid'],'family_background');
$educational_background = queryFetchAll($_SESSION['userid'],'educational_background');
$childrens = queryFetchAll($_SESSION['userid'],'children');
$civil_eligibility = queryFetchAll($_SESSION['userid'],'civil_eligibility');
$work_experience = queryFetchAll($_SESSION['userid'],'work_experience');
$voluntary_work = queryFetchAll($_SESSION['userid'],'voluntary_work');
$training_program = queryFetchAll($_SESSION['userid'],'training_program');
$other_information = queryFetchAll($_SESSION['userid'],'other_information');

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

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',7);
        $this->SetTextColor(0,0,0);
        // Page number
        $this->Cell(210,6,'CS FORM 212 (Revised 2017), Page '.$this->PageNo().' of {nb}',1,0,'R',false);
    }

    function Row($data,$height,$multicellHeight,$multicellPosition,$rectColor)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));


        if( $nb >= 2 ){
            $nb -= 0.5;
        }

        $h=$height*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : $multicellPosition;
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border

            if( isset($rectColor) ){
                $rectCol = explode('|',$rectColor['rectCol']);
                for( $j = 0; $j < count($rectCol); $j++ ){
                    if( $rectCol[$j] == $i || $rectColor['rectCol'] == 'allColumn' ){
                        if( $rectColor['rectCol'] == 'allColumn' ){
                            $this->SetTextColor(255,255,255);
                        }
                        $this->SetFont('Arial','B',7);
                        $this->SetFillColor($rectColor['r'], $rectColor['g'], $rectColor['b']);
                        $this->Rect($x,$y,$w,$h,'F');
                    }
                }
            }

            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,$multicellHeight,$data[$i],0,$a);
            $this->SetFont('Arial','',7);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        $GLOBALS['marginTop'] = $y+$h;
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

$pdf->AddPage();
include 'pages/page1.php';
$pdf->AddPage();
include 'pages/page2.php';
$pdf->AddPage();
include 'pages/page3.php';
$pdf->AddPage();
include 'pages/page4.php';

$pdf->Output();

?>

