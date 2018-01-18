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
$pdf->Rect(46, 37, 3, 2, 'D');

$pdf->SetXY(50,38);
$pdf->Cell(0,0,'and use separate sheet if necessary. Indicate N/A if not applicable. (',0,0,'');

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(127,38);
$pdf->Cell(0,0,'DO NOT ABBREVIATE. ',0,0,'');

$pdf->SetFont('Arial','',7);
$pdf->SetFillColor(150, 150, 150);
$pdf->Rect(160, 34, 20, 5, 'F');

$pdf->SetXY(163,37);
$pdf->Cell(0,0,'1. CS ID No.',0,0,'');

$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(180,34);
$pdf->Cell(33,5,'',1,0,'');
//$pdf->SetLineWidth(.5);

    $firstColumn = array(
        "",
        array(
            "",
            "1I. PERSONAL INFORMATION",
            "22. SURNAME",
            "3FIRST NAME",
            "4MIDDLE NAME",
            "5DATE OF BIRTH",
            "6(mm/dd/yyyy)",
            "7PLACE OF BIRTH",
            "8SEX",
            "9CIVIL STATUS",
            "10",
            "11HEIGHT(m)",
            "12WEIGHT(kg)",
            "13BLOOD TYPE",
            "14GSIS ID NO.",
            "15PAG-IBIG ID NO",
            "16PHILHEALTH NO.",
            "17SSS NO",
            "18TIN NO",
            "19AGENCY EMPLOYEE NO",
            "20II. FAMILY BACKGROUND",
            "21SPOUSE'S SURNAME",
            "22FIRST NAME",
            "23MIDDLE NAME",
            "24OCCUPATION",
            "25EMPLOYER/BUSINESS NAME",
            "26BUSINESS ADDRESS",
            "27TELEPHONE NO.",
            "28FATHER'S SURNAME",
            "29FIRST NAME",
            "30MIDDLE NAME",
            "31MOTHER'S MAIDEN NAME",
            "32SURNAME",
            "33FIRST NAME",
            "34MIDDLE NAME",
            "35III. EDUCATIONAL BACKGROUND",
            "36LEVEL",
            "37",
            "38ELEMENTARY",
            "39SECONDARY",
            "40VOCATIONAL/TRADE COURSE",
            "41COLLEGE",
            "42GRADUATE STUDIES",
            "43",
            "44SIGNATURE",
        ),
        array(
            "",
            "",
            $user['lname'],
            $user['lname'],
            $user['mname'],
            $user['date_of_birth'],
            "",
            $user['place_of_birth'],
            $user['sex'],
            $user['civil_status'],
            "",
            $user['height'],
            $user['weight'],
            $user['blood_type'],
            $user['gsis_idno'],
            $user['pag_ibigno'],
            $user['phicno'],
            $user['sssno'],
            $user['tin_no'],
            $user['userid'],
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "(Continue on separate sheet if necessary)",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ),
    );

    $width1 = [0,45,45,25,15,15,15,15,15,20]; // 210 default
    $marginLeft1 = 3; // 3default

    for($col=1; $col<=9; $col++){
        $pdf->SetFillColor(150, 150, 150); //GRAY
        $height1 = 6.6;
        $marginTop1 = 40;

        for($row=1; $row<=44; $row++){
            $border1 =  'LTRB';
            $colorFlag = false;
            $position1 = '';
            if($row == 1 || $row == 20 || $row == 35){
                $colorFlag = true;
                $border1 = 'SBT';
            }
            elseif($row == 5 || $row == 6 || $row == 9 || $row == 10){
                $border1 = 'LR';
            }
            elseif($row == 43){
                $border1 = 'SBT';
            }
            $pdf->SetXY($marginLeft1,$marginTop1);
            $pdf->Cell($width1[$col],$height1,$firstColumn[$col][$row],$border1,0,$position1,$colorFlag);

            $marginTop1 += 6.6;
        }

        $marginLeft1 += $width1[$col];
    }


















































//BOX AND CHECK
/*$pdf->SetFont('Arial','B',15);
$pdf->SetXY(187,34);
$pdf->Cell(5,5,'',1,0,'');

$pdf->SetXY(187,36);
$pdf->SetFont('ZapfDingbats','', 10);
$pdf->Cell(0, 0, 4, 0, 0);*/
//END BOX AND CHECK

// Arial bold 15
/*$pdf->SetFont('Arial','B',15);
// Calculate width of title and position
$w = $pdf->GetStringWidth('haha')+6;
$pdf->SetXY(150,80);
// Colors of frame, background and text
$pdf->SetDrawColor(0,80,180);
$pdf->SetFillColor(230,230,0);
$pdf->SetTextColor(220,50,50);
// Thickness of frame (1 mm)
$pdf->SetLineWidth(1);
// Title
$pdf->Cell($w,9,'haha',1,1,'C',true);
// Line break
$pdf->Ln(10);

$pdf->SetFont('Arial','B',15);
$pdf->SetXY(187,70);
$pdf->Cell(10,10,'',1,0,'');*/
?>