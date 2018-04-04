<?php
$pdf->SetFont('Arial','',7);
$pdf->SetX(3);
$pdf->Cell(210,274,'','TRL',0,'C');


$pdf->SetFillColor(150, 150, 150); //GRAY
$height1 = 6.6;
$marginTop1 = 10;

$border1 =  'LTRB';
$colorFlag = false;
$position1 = '';

$pdf->SetTextColor(255,255,255);
$colorFlag = true;

$pdf->SetXY(3,$marginTop1);
$pdf->Cell(210,$height1,'IV. CIVIL SERVICE ELIGIBILITY',$border1,0,$position1,$colorFlag);


$pdf->SetTextColor(0,0,0);
$marginTop1 += 6.6;
$civilWidth1 = ['',75,15,20,65,17,18];

$civilRow1 = [
    '',
    ['','CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER','RATING','DATE OF','PLACE OF EXAMINATION/CONFERMENT','LICENSE (if applicable)',''],
    ['','SPECIAL LAWS/CES/CSEE','','EXAMINATION/','PLACE OF EXAMINATION','','Date of'],
    ['','BARANGAY ELIGIBILITY / DRIVERS LICENSE','','CONFERMENT','','NUMBER','Validity']
];




for($row = 1; $row < count($civilRow1); $row++){
    $marginLeft1 = 3;
    $colorFlag = false;
    for($col = 1; $col < count($civilRow1[1]); $col++){

        $border1 = '1';
        if( $row == 1 ){
            $border1 = 'LTR';
            if( $col == 5 || $col == 6 ){
                $border1 = 'BT';
            }
        }
        elseif ( $row == 2 ){
            $border1 = 'LR';
        }
        elseif( $row == 3 ){
            $border1 = 'LRB';
        }


        $pdf->SetXY($marginLeft1,$marginTop1);
        $pdf->Cell($civilWidth1[$col],$height1,$civilRow1[$row][$col],$border1,0,$position1,$colorFlag);

        $marginLeft1 += $civilWidth1[$col];
    }
    $marginTop1 += 6.6;
}




$marginTop1 += 6.6;

$pdf->SetTextColor(0,0,0);
$pdf->SetWidths(array(45,45,31,13,13,13,15,15,20));
$pdf->SetXY(3,$marginTop1);

/*$pdf->SetLeftMargin(3);
$pdf->Row(array('27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE ','RATING (If Applicable)','Date of Examination/Conferment','Place Of Examination'));*/



?>