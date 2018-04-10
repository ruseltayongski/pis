<?php
$GLOBALS['marginTop'] = 10;
$pdf->SetXY(3,$GLOBALS['marginTop']);
$pdf->SetWidths(array(210));
$pdf->SetFont('Arial','',7);
$rectColor = ['r' => 150,'g' => 150,'b' => '150','rectCol' => 'allColumn'];
$pdf->Row(['VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S'],6.6,7,'L',$rectColor);

$pdf->SetTextColor(0,0,0);
$voluntaryWidth = ['',90,20,20,20,60];

$voluntaryRow = [
    '',
    ['','NAME & ADDRESS OF ORGANIZATION','','','',''],
    ['','(Write in full)','','','','POSITION / NATURE OF WORK'],
    ['','','From','To','','']
];
$position = '';
$height = 6.6;

$pdf->SetFillColor(237, 235, 236);
$pdf->SetXY(3,$GLOBALS['marginTop']);
$pdf->Cell(210,20,'',0,0,$position,true);
for($row = 1; $row < count($voluntaryRow); $row++){
    $marginLeft = 3;
    $colorFlag = false;
    $position = 'C';
    for($col = 1; $col < count($voluntaryRow[1]); $col++){

        $border = '1';
        if( $row == 1 ){
            $border = 'RL';
            if( $col == 2 ){
                $border = 'L';

                $pdf->SetXY($marginLeft+9,$GLOBALS['marginTop']+2);
                $pdf->Cell($voluntaryWidth[$col],$height,'INCLUSIVE DATES',0,0,$position,$colorFlag);

                $pdf->SetXY($marginLeft+9,$GLOBALS['marginTop']+7);
                $pdf->Cell($voluntaryWidth[$col],$height,'(mm/dd/yyyy)',0,0,$position,$colorFlag);

            }
            elseif( $col == 3 ){
                $border = 'R';
            }
            elseif( $col == 4 ){
                $pdf->SetXY($marginLeft,$GLOBALS['marginTop']+2);
                $pdf->Cell($voluntaryWidth[$col],$height,'NUMBER OF',0,0,$position,$colorFlag);

                $pdf->SetXY($marginLeft,$GLOBALS['marginTop']+7);
                $pdf->Cell($voluntaryWidth[$col],$height,'HOURS',0,0,$position,$colorFlag);
            }
        }
        elseif ( $row == 2 ){
            $border = 'RL';
            if( $col == 2 ){
                $border = 'LB';
            }
            elseif( $col == 3 ){
                $border = 'RB';
            }
        }
        elseif( $row == 3 ){
            $border = 'RLB';
            if( $col == 2 ){
                $border = 'RTB';
            }
            elseif( $col == 3 ){
                $border = 'LTB';
            }
        }


        $pdf->SetXY($marginLeft,$GLOBALS['marginTop']);
        $pdf->Cell($voluntaryWidth[$col],$height,$voluntaryRow[$row][$col],$border,0,$position,$colorFlag);

        $marginLeft += $voluntaryWidth[$col];
    }
    $GLOBALS['marginTop'] += 6.6;
}

$GLOBALS['marginTop'] += 6.6;

$pdf->SetWidths(array(90,20,20,20,60));
$pdf->SetXY(3,$GLOBALS['marginTop']);
$pdf->SetLeftMargin(3);

$voluntaryColumn = ['name_of_organization','date_from','date_to','number_of_hours','nature_of_work'];
$voluntaryRowCount = 1;
foreach( $voluntary_work as $row ){
    for( $i = 0; $i < count($voluntaryColumn); $i++ ){
        $voluntaryData[$i] = $row[$voluntaryColumn[$i]];
    }
    $pdf->Row($voluntaryData,7,5,'C',null);
    $voluntaryRowCount++;
}

for( $j = $voluntaryRowCount; $j <= 27; $j++ ){
    $pdf->Row(['','','','','','','',''],7,5,'C',null);
    $voluntaryRowCount++;
}

?>