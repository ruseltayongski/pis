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
            "6",
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
            "36",
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
            $user['fname'],
            $user['mname'],
            $user['date_of_birth'],
            "",
            $user['place_of_birth'],
            "",
            "",
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
            $family_background['sln'],
            $family_background['sfn'],
            $family_background['sln'],
            $family_background['smn'],
            $family_background['sne'],
            $family_background['soccu'],
            $family_background['sbadd'],
            $family_background['stelno'],
            $family_background['fln'],
            $family_background['ffn'],
            $family_background['fmn'],
            $family_background['mmln'],
            $family_background['ms'],
            $family_background['mfn'],
            $family_background['mmn'],
            "",
            "",
            "",
            $educational_background1['name_of_school'],
            $educational_background2['name_of_school'],
            $educational_background3['name_of_school'],
            $educational_background4['name_of_school'],
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
            "CITIZENSHIP",
            "",
            "",
            "",
            "RESIDENTIAL ADDRESS",
            "",
            "",
            "ZIP CODE",
            "PERMANENT ADDRESS",
            "",
            "",
            "ZIP CODE",
            "TELEPHONE NO",
            "MOBILE NO",
            "E-MAIL ADDRESS (if any)",
            "",
            "",
            "Name Extension (JR,SR)",
            "",
            "",
            "",
            "",
            "",
            "",
            "Name Extension (JR,SR)",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            $educational_background1['degree_course'],
            $educational_background2['degree_course'],
            $educational_background3['degree_course'],
            $educational_background4['degree_course'],
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

    $width1 = [0,45,45,31,13,13,13,15,15,20]; // 210 default
    $marginLeft1 = 3; // 3default

    for($col=1; $col<=9; $col++){
        $pdf->SetFillColor(150, 150, 150); //GRAY
        $height1 = 6.6;
        $marginTop1 = 40;

        for($row=1; $row<=44; $row++){
            $pdf->SetTextColor(0,0,0);
            $border1 =  'LTRB';
            $colorFlag = false;
            $position1 = '';
            if($row == 1 || $row == 20 || $row == 35){
                $pdf->SetTextColor(255,255,255);
                $colorFlag = true;
                $border1 = 'BT';
            }
            elseif(($col == 2 || $col == 3) && ($row == 2 || $row == 3 )){
                $border1 = 'BT';
            }
            elseif( $row == 4 ){
                $border1 = 'BT';
                if( $col == 1 )
                    $border1 = 'BTRL';
            }
            elseif( $row == 5 ){
                $border1 = 'T';
                if( $col == 1 ){
                    $border1 = 'TR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TR';
                }
                elseif( $col == 4 ){
                    $border1 = 'TR';
                }
            }
            elseif( $row == 6 ) {
                $border1 = 'B';
                if( $col == 1 ){
                    $border1 = 'BR';
                    $pdf->SetXY($marginLeft1+2,$marginTop1-3);
                    $pdf->Cell($width1[$col],$height1,'(mm/dd/yyyy)',0,0,$position1,$colorFlag);
                }
                elseif( $col == 2 ){
                    $border1 = 'RB';
                }
                elseif( $col == 3 ){
                    $border1 = 'L';
                }
                elseif( $col == 4 ){
                    $border1 = 'R';
                }
                elseif( $col == 5 ){
                    $border1 = 'L';
                }
                elseif( $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = '0';
                }
            }
            elseif( $row == 7 ) {
                if( $col == 3 ){
                    $border1 = 'L';
                    $pdf->SetXY($marginLeft1+4,$marginTop1);
                    $pdf->Cell($width1[$col],$height1,'If holder of dual citizenship.',0,0,$position1,$colorFlag);
                }
                elseif( $col == 4 ){
                    $border1 = '0';
                }
                elseif( $col == 5 ){
                    $border1 = 'L';
                }
                elseif( $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = '0';
                }
            }
            elseif( $row == 8 ){
                if( $col == 3 ){
                    $border1 = 'LB';
                    $pdf->SetXY($marginLeft1+5,$marginTop1);
                    $pdf->Cell($width1[$col],$height1,'please indicate the details.',0,0,$position1,$colorFlag);
                }
                elseif( $col == 4 ){
                    $border1 = 'B';
                }
                elseif( $col == 5 ){
                    $border1 = 'BL';
                }
                elseif( $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'B';
                }
            }
            elseif ( $row == 9 ){
                $border1 = 'LR';
                if( $col == 4 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'BT';
                }
            }
            elseif ( $row == 10 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 11 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 12 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 14 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 15 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 16 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 21 ){
                if( $col == 1 ){
                    $border1 = 'LR';
                }
                elseif( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 22 ){
                if( $col == 1 ){
                    $border1 = 'LR';
                }
            }
            elseif ( $row == 23 ){
                if( $col == 1 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 24 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 25 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 26 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 27 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 28 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 30 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 31 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 32 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 33 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 34 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 35 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif ( $row == 38 || $row == 39 || $row == 40 || $row == 41 || $row == 42 ){
                if( $col == 3 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 ){
                    $border1 = 'TBR';
                }
            }
            elseif($row == 43){
                $border1 = 'BT';
            }
            elseif($row == 10 && $col == 2){
                $border1 = 'B';
            }
            elseif( $row == 36 ){
                $border1 = 'TL';
                if( $col == 1 ){
                    $rowLeft36 = $marginLeft1 + 17;
                    $rowTop36 = $marginTop1 + 4;
                    $pdf->SetXY($rowLeft36,$rowTop36);
                    $pdf->Cell($width1[$col],$height1,'Level',0,0,$position1,$colorFlag);
                }
                elseif( $col == 2 ){
                    $rowLeft36 = $marginLeft1 + 12;
                    $rowTop36 = $marginTop1 + 1;
                    $pdf->SetXY($rowLeft36,$rowTop36);
                    $pdf->Cell($width1[$col],$height1,'NAME OF SCHOOL',0,0,$position1,$colorFlag);
                }
                elseif( $col == 3 ){
                    $border1 = 'LT';
                    $rowLeft36 = $marginLeft1 + 0.5;
                    $rowTop36 = $marginTop1 + 1;
                    $pdf->SetXY($rowLeft36,$rowTop36);
                    $pdf->Cell($width1[$col],$height1,'Basic Educational/Degree/Course',0,0,$position1,$colorFlag);
                }
                elseif( $col == 4 ){
                    $border1 = 'RT';
                }
                elseif( $col == 5 ) {
                    $border1 = 'LTB';
                    $pdf->SetXY($marginLeft1+1,$marginTop1);
                    $pdf->Cell($width1[$col],$height1,'Period of Attendance',0,0,$position1,$colorFlag);
                }
                elseif( $col == 6 ) {
                    $border1 = 'TB';
                }

                if( $col == 2 || $col == 3){
                    $rowLeft36 = $marginLeft1 + 16;
                    $rowTop36 = $marginTop1 + 5;
                    $pdf->SetXY($rowLeft36,$rowTop36);
                    $pdf->Cell($width1[$col],$height1,'(Write in full)',0,0,$position1,$colorFlag);
                }

            }
            elseif( $row == 37 ){
                $border1 = 'BL';
                if( $col == 3 ){
                    $border1 = 'LB';
                }
                elseif( $col == 4 ){
                    $border1 = 'RB';
                }
            }
            $pdf->SetXY($marginLeft1,$marginTop1);
            $pdf->Cell($width1[$col],$height1,$firstColumn[$col][$row],$border1,0,$position1,$colorFlag);

            $marginTop1 += 6.6;
        }

        $marginLeft1 += $width1[$col];
    }

    //checkbox
    $marginTop = 88;
    $marginTopCheck = 89.5;
    $boxCell = array(
        "",
        array("","Male","Single","Widowed","Others"),
        array("","Female","Married","Separated","")
    );
    for ( $row=1; $row<=4; $row++ ) {
        $marginLeftBox = 50;
        $marginLeftCheck = 49.5;
        $marginLeftCell = 53;
        for ( $col=1; $col<=2; $col++ ) {
            if($col == 2 && $row == 4){
                break;
            }
            $pdf->SetFont('Arial','',7);
            $pdf->SetXY($marginLeftCell,$marginTop);
            $pdf->Cell(3,3,$boxCell[$col][$row],0,0,'');

            $pdf->SetFont('Arial','B',15);
            $pdf->SetXY($marginLeftBox,$marginTop);
            $pdf->Cell(3,3,'',1,0,'');

            if( $user['sex'] == $boxCell[$col][$row] || $user['civil_status'] == $boxCell[$col][$row] ){
                $pdf->SetXY($marginLeftCheck,$marginTopCheck);
                $pdf->SetFont('ZapfDingbats','', 7);
                $pdf->Cell(0, 0, 4, 0, 0);
            }

            $marginLeftBox += 26;
            $marginLeftCell += 26;
            $marginLeftCheck += 26;

        }
        $marginTop += 4.9;
        $marginTopCheck += 4.9;
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