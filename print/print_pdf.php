<?php
session_start();

function connect(){
    return new PDO("mysql:host=192.168.110.31;dbname=pis",'rtayong_31','rtayong_31');
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

function workExperience($userid){
    $db=connect();
    $sql= "SELECT * FROM `work_experience` WHERE userid = ? order by STR_TO_DATE(date_from,'%m/%d/%Y') DESC";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($userid));
    $row=$pdo->fetchAll();
    $db=null;

    return $row;
}

function trainingProgram($userid){
    $db=connect();
    $sql= "SELECT * FROM `training_program` WHERE userid = ? order by STR_TO_DATE(date_from,'%m/%d/%Y') DESC";
    $pdo=$db->prepare($sql);
    $pdo->execute(array($userid));
    $row=$pdo->fetchAll();
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

function test(){
    $db=connect();
    $sql= "select * from survey";
    $pdo=$db->prepare($sql);
    $pdo->execute();
    $row=$pdo->fetchAll();
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
$work_experience = workExperience($_SESSION['userid']);
$voluntary_work = queryFetchAll($_SESSION['userid'],'voluntary_work');
$training_program = trainingProgram($_SESSION['userid']);
$other_information = queryFetchAll($_SESSION['userid'],'other_information');
$survey = queryFetch($_SESSION['userid'],'survey');
//echo json_encode($survey['consanguinity_a']);

/**
 * Created by PhpStorm.
 * User: rtayong
 * Date: 1/17/2018
 * Time: 2:26 PM
 */

include_once 'fpdf.php';


$GLOBALS['trainingAndOtherBreakCount'] = 0;
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
        if(!isset($GLOBALS['isFinished'])){
            // Position at 1.5 cm from bottom
            $this->SetFont('Arial','B',7);
            $this->SetTextColor(237,28,36);
            $this->SetXY(3,-42);
            $this->Cell(210,4,'(Continue on separate sheet if necessary)',1,0,'C',false);

            $this->SetTextColor(0,0,0);
            $this->SetFillColor(150, 150, 150);
            $this->SetFont('Arial','',15);
            $this->SetXY(3,-38);
            $this->Cell(43,8,'SIGNATURE',1,0,'C',true);
            $this->SetXY(46,-38);
            $this->Cell(89,8,'',1,0,'',false);
            $this->SetXY(135,-38);
            $this->Cell(30,8,'DATE',1,0,'C',true);
            $this->SetXY(165,-38);
            $this->Cell(48,8,'',1,0,'',false);
        }
        $this->SetXY(3,-30);
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
        $this->CheckPageBreak($h,$data);
        if($GLOBALS['trainingAndOtherBreakCount'] > 0 && $data[0] == '' && $data[1] == '' && $data[2] == '' ){
            return false;
        }
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

    function CheckPageBreak($h,$data)
    {
        //If the height h would cause an overflow, add a new page immediately
        if(isset($GLOBALS['isTrainingStart'])){
            $addBreak = 21;
        } else {
            $addBreak = 18;
        }
        if($this->GetY()+$h+$addBreak>$this->PageBreakTrigger){
            if(isset($GLOBALS['isTrainingStart']) && $data[0] == '' && $data[1] == '' && $data[2] == ''){
                $GLOBALS['trainingAndOtherBreakCount'] += 1;
                $GLOBALS['isTrainingStart'] = false;
                return false;
            }
            $this->AddPage($this->CurOrientation);
        }
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

