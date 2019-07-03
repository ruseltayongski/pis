<?php
$marginTop1 = 2;

$pdf->SetFont('Arial','BI',8);
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(210,274,'','TLR',0,'L',false);

$marginTop1 += 2;
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(3,3,'CS Form No. 212',0,0,'L',false);

$marginTop1 += 6;
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(0,0,'Revised 2017',0,0,'',false);


$marginTop1 += 1;
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(100,$marginTop1);
$pdf->Cell(10,5,'PERSONAL DATA SHEET',0,0,'C',false);

$marginTop1 += 12;
$pdf->SetFont('Arial','BI',7);
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(0,0,'WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminals case/s against the person',0,0,'',false);

$marginTop1 += 3;
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(0,0,'concerned',0,0,'',false);

$marginTop1 += 3;
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(0,0,'READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.',0,0,'',false);

$marginTop1 += 3;
$pdf->SetFont('Arial','',7);
$pdf->SetXY(3,$marginTop1);
$pdf->Cell(0,0,'Print legibly. Tick appropriate boxes ( ',0,0,'',false);

$pdf->SetXY(50,$marginTop1);
$pdf->Cell(0,0,'and use separate sheet if necessary. Indicate N/A if not applicable. (',0,0,'');
$pdf->SetXY(46,$marginTop1-1);
$pdf->Cell(3,3,'',1,0,'',false);


$pdf->SetXY(127,$marginTop1);
$pdf->Cell(0,0,'DO NOT ABBREVIATE. ',0,0,'',false);


$pdf->SetFillColor(150, 150, 150);
$pdf->SetXY(158,$marginTop1-4);
$pdf->Cell(17,5,'1. CS ID No.',1,0,'',true);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(175,$marginTop1-4);
$pdf->Cell(38,5,'(Do not fill up. For CSC use only)',1,0,'',false);

    $firstColumn = array(
        "",
        array(
            "",
            "I. PERSONAL INFORMATION",
            "2. SURNAME",
            "FIRST NAME",
            "MIDDLE NAME",
            "3. DATE OF BIRTH",
            "",
            "4. PLACE OF BIRTH",
            "5. SEX",
            "6. CIVIL STATUS",
            "",
            "7. HEIGHT(m)",
            "8. WEIGHT(kg)",
            "9. BLOOD TYPE",
            "10. GSIS ID NO.",
            "11. PAG-IBIG ID NO",
            "12. PHILHEALTH NO.",
            "13. SSS NO",
            "14. TIN NO",
            "15. AGENCY EMPLOYEE NO",
            "II. FAMILY BACKGROUND",
            "22. SPOUSE'S SURNAME",
            "FIRST NAME",
            "MIDDLE NAME",
            "OCCUPATION",
            "EMPLOYER/BUSINESS NAME",
            "BUSINESS ADDRESS",
            "TELEPHONE NO.",
            "24. FATHER'S SURNAME",
            "FIRST NAME",
            "MIDDLE NAME",
            "25. MOTHER'S MAIDEN NAME",
            "SURNAME",
            "FIRST NAME",
            "MIDDLE NAME",
            "III. EDUCATIONAL BACKGROUND",
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
            ""
        ),
        array(
            "",
            "",
            "",
            "",
            "",
            "16. CITIZENSHIP",
            "",
            "",
            "",
            "17. RESIDENTIAL ADDRESS",
            "",
            "",
            "ZIP CODE",
            "18. PERMANENT ADDRESS",
            "",
            "",
            "ZIP CODE",
            "19. TELEPHONE NO",
            "20. MOBILE NO",
            "21. E-MAIL ADDRESS (if any)",
            "",
            "",
            "Name Extension (JR,SR):",
            "",
            "",
            "",
            "",
            "",
            "",
            "Name Extension (JR,SR):",
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
            "23. NAME of Children (Write full name and list all)",
            "",
            "",
            "",
            "",
            "",
            "",
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
            $user['indicate_country'],
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "From"
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
            "To"
        ),
        array(
            "",
            "",
            "",
            "NAME EXTENSION (JR., SR): ".$user['name_extension'],
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
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
            "",//Street,
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
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
            ""
        ),
    );

    $width1 = [0,43,45,31,13,15,15,13,15,20]; // 210 default
    $marginLeft1 = 3; // 3default

    $marginTop1 += 3;
    $marginTopTemp = $marginTop1;
    for($col=1; $col<=9; $col++){
        $pdf->SetFillColor(150, 150, 150); //GRAY
        $height1 = 6.6;
        $marginTop1 = $marginTopTemp;

        for($row=1; $row<=37; $row++){
            $pdf->SetTextColor(0,0,0);
            $border1 =  'LTRB';
            $colorFlag = false;
            $position1 = '';

            if($row == 1 || $row == 20 || $row == 35){
                $pdf->SetTextColor(255,255,255);
                $colorFlag = true;
                if( $col == 1 ){
                    $border1 = 'LBT';
                }
                elseif( $col == 9 ){
                    $border1 = 'RBT';
                }
                else {
                    $border1 = 'TB';
                }
            }
            elseif( $row == 2 ){
                $border1 = 'BT';
                if( $col == 1 ){
                    $border1 = '1';
                }
            }
            elseif( $row == 3 ){
                $border1 = 'BT';
                if( $col == 1 ){
                    $border1 = '1';
                }
                elseif( $col == 7 ){
                    $border1 = 'TBL';
                }
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
                if( $col == 3 ){
                    $border1 = '1';
                    $pdf->SetFont('Arial','',6);
                }
                elseif( $col == 4 ){
                    $border1 = 'TBL';
                    $pdf->SetXY($marginLeft1,$marginTop1);
                    $pdf->Cell($width1[$col]+78,4,'',1,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','B',6);
                    $pdf->SetXY($marginLeft1+14,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['RHouseNo'],0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+50,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['RStreet'],0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+10,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'House/Block/Lot No.',0,0,$position1,$colorFlag);
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 9 ) {
                    $border1 = 'BT';
                }
                elseif( $col == 8 ){
                    $border1 = 'BT';
                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Street',0,0,$position1,$colorFlag);
                }
                else{
                    $pdf->SetFont('Arial','',7);
                }
            }
            elseif ( $row == 10 ){
                $border1 = 'LR';
                if( $col == 4 ){
                    $border1 = 'TBL';
                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1,$marginTop1);
                    $pdf->Cell($width1[$col]+78,4,'',1,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','B',6);
                    $pdf->SetXY($marginLeft1+14,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['RSubdivision'],0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+50,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['RBarangay'],0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+10,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Subdivision/Village',0,0,$position1,$colorFlag);
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 9 ) {
                    $border1 = 'BT';
                }
                elseif( $col == 8 ){
                    $border1 = 'BT';
                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Barangay',0,0,$position1,$colorFlag);
                }
                $pdf->SetFont('Arial','',7);
            }
            elseif ( $row == 11 ){
                if( $col == 2 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 3 ){
                    $border1 = 'LR';
                }
                elseif( $col == 4 ){
                    $border1 = 'BT';
                    $pdf->SetFont('Arial','B',6);
                    $pdf->SetXY($marginLeft1,$marginTop1);
                    $pdf->Cell($width1[$col]+78,4,'',1,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+14,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['RMunicipality'],0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+50,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['RProvince'],0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+10,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'City/Municipality',0,0,$position1,$colorFlag);
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 9 ) {
                    $border1 = 'BT';
                }
                elseif( $col == 8 ){
                    $border1 = 'BT';
                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Province',0,0,$position1,$colorFlag);
                }
                $pdf->SetFont('Arial','',7);
            }
            elseif ( $row == 12 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'BT';
                }
            }
            elseif ( $row == 13 ){
                if( $col == 2 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 3 ){
                    $pdf->SetFont('Arial','',6);
                    $border1 = 'LR';
                }
                elseif( $col == 4 ){
                    $border1 = 'TBL';
                    $pdf->SetFont('Arial','B',6);
                    $pdf->SetXY($marginLeft1,$marginTop1);
                    $pdf->Cell($width1[$col]+78,4,'',1,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+14,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['PHouseNo'],0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+50,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['PStreet'],0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+10,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'House/Block/Lot No.',0,0,$position1,$colorFlag);
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 9 ) {
                    $border1 = 'BT';
                }
                elseif( $col == 8 ){
                    $border1 = 'BT';
                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Street',0,0,$position1,$colorFlag);
                }
                else{
                    $pdf->SetFont('Arial','',7);
                }
            }
            elseif ( $row == 14 ){
                if( $col == 2 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 3 ){
                    $border1 = 'LR';
                }
                if( $col == 4 ){
                    $border1 = 'TBL';
                    $pdf->SetFont('Arial','B',6);
                    $pdf->SetXY($marginLeft1,$marginTop1);
                    $pdf->Cell($width1[$col]+78,4,'',1,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+14,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['PSubdivision'],0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+50,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['PBarangay'],0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+10,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Subdivision/Village',0,0,$position1,$colorFlag);
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 9 ) {
                    $border1 = 'BT';
                }
                elseif( $col == 8 ){
                    $border1 = 'BT';
                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Barangay',0,0,$position1,$colorFlag);
                }
                $pdf->SetFont('Arial','',7);
            }
            elseif ( $row == 15 ){
                if( $col == 2 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 3 ){
                    $border1 = 'LR';
                }
                elseif( $col == 4 ){
                    $border1 = 'BT';
                    $pdf->SetFont('Arial','B',6);
                    $pdf->SetXY($marginLeft1,$marginTop1);
                    $pdf->Cell($width1[$col]+78,4,'',1,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+14,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['PMunicipality'],0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+50,$marginTop1);
                    $pdf->Cell($width1[$col]+76,4,$user['PProvince'],0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+10,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'City/Municipality',0,0,$position1,$colorFlag);
                }
                elseif( $col == 5 || $col == 6 || $col == 7 || $col == 9 ) {
                    $border1 = 'BT';
                }
                elseif( $col == 8 ){
                    $border1 = 'BT';
                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Province',0,0,$position1,$colorFlag);
                }
                $pdf->SetFont('Arial','',7);
            }
            elseif ( $row == 16 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'BT';
                }
            }
            elseif ( $row == 17 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'BT';
                }
            }
            elseif ( $row == 18 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'BT';
                }
            }
            elseif ( $row == 19 ){
                if( $col == 2 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 3 ){
                    $border1 = 'LRB';
                    $pdf->SetFont('Arial','',6);
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 || $col == 8 || $col == 9 ) {
                    $border1 = 'BT';
                }
            }
            elseif ( $row == 21 ){
                if( $col == 1 ){
                    $border1 = 'LR';
                }
                elseif($col == 4){
                    $border1 = 'TBL';
                    $pdf->SetFont('Arial','',6);
                }
                elseif( $col == 2 || $col == 3 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = 'TB';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+9,$marginTop1-1.5);
                    $pdf->Cell($width1[$col],$height1,'DATE OF BIRTH',0,0,$position1,$colorFlag);

                    $pdf->SetFont('Arial','',6);
                    $pdf->SetXY($marginLeft1+11,$marginTop1+1);
                    $pdf->Cell($width1[$col],$height1,'(mm/dd/yyyy)',0,0,$position1,$colorFlag);
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 22 ){
                if( $col == 1 ){
                    $border1 = 'LR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBLR';
                }
                elseif( $col == 4 ){
                    $border1 = '0';
                    $marginTopChildren = $marginTop1;
                    $childRow = 1;
                    $pdf->setFont('Arial','B','6');
                    foreach ( $childrens as $child ) {
                        $pdf->SetXY($marginLeft1,$marginTopChildren);
                        $pdf->Cell($width1[$col]+43,$height1,'',1,0,$position1,$colorFlag);//dummy cell
                        //
                        $pdf->SetXY($marginLeft1+1,$marginTopChildren);
                        $pdf->Cell($width1[$col]+43,$height1,$child['name'],'TB',0,$position1,$colorFlag);
                        $marginTopChildren += 6.6;
                        $childRow++;
                    }
                    $pdf->setFont('Arial','','7');
                    for ( $i = $childRow; $i <= 13; $i++ ){
                        $pdf->SetXY($marginLeft1,$marginTopChildren);
                        $pdf->Cell($width1[$col]+43,$height1,'',1,0,$position1,$colorFlag);
                        $marginTopChildren += 6.6;
                    }
                }
                elseif( $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = '0';
                    $marginTopChildren = $marginTop1;
                    $childRow = 1;
                    foreach ( $childrens as $child ) {
                        $pdf->SetXY($marginLeft1+1,$marginTopChildren);
                        $pdf->Cell($width1[$col]+19,$height1,$child['date_of_birth'],'BT',0,$position1,$colorFlag);
                        $marginTopChildren += 6.6;
                        $childRow++;
                    }
                    for ( $i = $childRow; $i <= 13; $i++ ){
                        $pdf->SetXY($marginLeft1,$marginTopChildren);
                        $pdf->Cell($width1[$col]+20,$height1,'',1,0,$position1,$colorFlag);
                        $marginTopChildren += 6.6;
                    }
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 23 ){
                if( $col == 1 ){
                    $border1 = 'LRB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 24 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 25 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 26 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 27 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 28 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 29 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBRL';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 30 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 31 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 32 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 33 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 34 ){
                if( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 3 ){
                    $border1 = 'TBR';
                }
                elseif( $col == 2 ){
                    $border1 = 'TB';
                }
                elseif( $col == 4 || $col == 5 || $col == 6 || $col == 7 ){
                    $border1 = '0';
                }
                elseif( $col == 8 ){
                    $border1 = 'TBL';
                }
                elseif( $col == 9 ){
                    $border1 = 'TBR';
                }
            }
            elseif ( $row == 35 ){
                if( $col == 2 || $col == 3 ){
                    $border1 = 'TB';
                }
            }
            elseif( $row == 36 ){
                $border1 = 'TL';
                $pdf->SetFont('Arial','',7);
                if( $col == 1 ){
                    $rowLeft36 = $marginLeft1 + 17;
                    $rowTop36 = $marginTop1 + 4;
                    $pdf->SetXY($rowLeft36,$rowTop36);
                    $pdf->Cell($width1[$col],$height1,'26. Level',0,0,$position1,$colorFlag);
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
                elseif( $col == 7 ){
                    $pdf->SetFont('Arial','',5.2);
                    $pdf->SetXY($marginLeft1,$marginTop1-1);
                    $pdf->Cell($width1[$col],$height1,'Highest Level/',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Units Earned/',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1,$marginTop1+5);
                    $pdf->Cell($width1[$col],$height1,'(if not gradua-',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1,$marginTop1+8);
                    $pdf->Cell($width1[$col],$height1,'ted)',0,0,$position1,$colorFlag);
                }
                elseif( $col == 8 ){
                    $pdf->SetXY($marginLeft1+3,$marginTop1+1.5);
                    $pdf->Cell($width1[$col],$height1,'Year',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1,$marginTop1+4);
                    $pdf->Cell($width1[$col],$height1,'Graduated',0,0,$position1,$colorFlag);
                }

                elseif( $col == 9 ){
                    $pdf->SetXY($marginLeft1+2,$marginTop1-1);
                    $pdf->Cell($width1[$col],$height1,'Scholarship/',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+2,$marginTop1+2);
                    $pdf->Cell($width1[$col],$height1,'Academic/',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+2,$marginTop1+5);
                    $pdf->Cell($width1[$col],$height1,'Honors',0,0,$position1,$colorFlag);

                    $pdf->SetXY($marginLeft1+2,$marginTop1+8);
                    $pdf->Cell($width1[$col],$height1,'Receive',0,0,$position1,$colorFlag);
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
                elseif( $col == 5 || $col == 6 ){
                    $position1 = 'C';
                }
                elseif( $col == 9 ){
                    $border1 = 'LBR';
                }
            }

            $pdf->SetXY($marginLeft1,$marginTop1);
            $pdf->Cell($width1[$col],$height1,$firstColumn[$col][$row],$border1,0,$position1,$colorFlag);

            $marginTop1 += 6.6;
            $marginTopTemp1 = $marginTop1; // hold the original margintop
        }
        $marginLeft1 += $width1[$col];
    }
    $marginTop1 = $marginTopTemp1; // get the original margin top 279.2

    //row 1 result
    $row1Key = ['user|lname','user|fname','user|mname','user|date_of_birth','user|place_of_birth','user|height','user|weight',
                'user|blood_type','user|gsis_idno','user|pag_ibigno','user|phicno','user|sssno','user|tin_no','user|userid',
                'family_background|sln','family_background|sfn','family_background|smn','family_background|soccu','family_background|sbname',
                'family_background|sbname','family_background|stelno','family_background|fln','family_background|ffn','family_background|fmn',
                'family_background|mmln','family_background|ms','family_background|mfn','family_background|mmn'];
    $row1TopIncrement = ['6.6','6.6','6.6','13','26','6.6','6.6','6.6','6.6','6.6','6.6','6.6','6.6'
                        ,'13.3','6.6','6.6','6.6','6.6','6.6','6.6','6.6','6.6','6.6','6.6','6.6','6.6',
                        '6.6',''];
    $row1marginTop = 43.5;
    for($row=0; $row<count($row1Key);$row++){
        $pdf->SetFont('Arial','B',6);
        $pdf->SetXY(47,$row1marginTop);
        if($row1Key[$row] != 'user|userid'){
            $pdf->Cell(3,3,${explode('|',$row1Key[$row])[0]}[explode('|',$row1Key[$row])[1]],0,0,'');
        } //WALA NA DISPLAY ANG EMPLOYEE ID
        $row1marginTop += $row1TopIncrement[$row];
    }
    $pdf->SetFont('Arial','B',6);
    $pdf->SetXY(116,175.5);
    $pdf->Cell(3,3,$family_background['sne'],0,0,'');
    $pdf->SetXY(116,222);
    $pdf->Cell(3,3,$family_background['fne'],0,0,'');

    //row 2 result
    $row2Key = ['RZip_code','PZip_code','telno','cellno','email_address'];
    $row2TopIncrement = ['27','6.6','6.6','6.6','6.6',''];
    $row2marginTop = 109;
    for($row=0;$row<count($row2Key);$row++){
        $pdf->SetFont('Arial','B',6);
        $pdf->SetXY(122.5,$row2marginTop);
        $pdf->Cell(3,3,$user[$row2Key[$row]],0,0,'');
        $row2marginTop += $row2TopIncrement[$row];
    }
    $pdf->SetFont('Arial','',6);

    //checkbox
    $marginTop = $marginTop1 - 196.2;
    $marginTopCheck = $marginTop1 - 194.7;
    $boxCell = array(
        "",
        array("","Male","Single","Widowed","Others"),
        array("","Female","Married","Separated","")
    );
    for ( $row=1; $row<=4; $row++ ) {
        $marginLeftBox = 48;
        $marginLeftCheck = 47.5;
        $marginLeftCell = 51;
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

    //checkbox
    $marginTop = $marginTop1 - 216.2;
    $marginTopCheck = $marginTop1 - 214.7;
    $boxCell = array(
        "",
        array("","Filipino","Dual Citizenship"),
        array("","by birth","by naturalization"),
    );
    for ( $row=1; $row<=2; $row++ ) {
        $marginLeftBox = 150;
        $marginLeftCheck = 149.5;
        $marginLeftCell = 153;
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

            if( $user['citizenship'] == $boxCell[$col][$row] ){
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

    $border1 =  '1';
    $columnData = ['level','name_of_school','degree_course','poa_from','poa_to','units_earned','year_graduated','scholarship',''];
    $rowCount = 0;
    $pdf->SetWidths(array(43,45,44,15,15,13,15,20));
    $pdf->SetXY(3,$marginTop1);

    $GLOBALS['marginTop'] = $marginTop1;

    foreach($educational_background as $row) {
        $rowCount++;
        for( $j = 0; $j < count($columnData); $j++ ){
            $rowData[$j] = $columnData[$j];
        }
        for($col=1; $col < count($columnData); $col++)
        {
            if ( isset($row[$rowData[$col-1]]) )
            {
                $finalData = $row[$rowData[$col-1]];
                if( $rowData[$col-1] == 'level' && education_type($finalData) ){
                    $finalData = education_type($finalData)['description'];
                }
            }
            else
            {
                $finalData = '';
            }

            $multiColumn[$col-1] = $finalData;
        }
        $pdf->SetLeftMargin(3);
        $pdf->SetFont('Arial','',7);
        $pdf->Row($multiColumn,7,5,'C',null);

    }


?>