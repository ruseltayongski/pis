<?php
$marginTop = 1;
$boxWidth = 4;
$boxHeight = 3;
$GLOBALS['isFinished'] = true;

$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,33,'','1',0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the '.$GLOBALS['temp'],0,0,'L',false);
$pdf->SetXY(8,$marginTop+4);
$pdf->Cell(130,10,'chief of bureau or office or to the person who has immediate supervision over you in the Office, ',0,0,'L',false);
$pdf->SetXY(8,$marginTop+8);
$pdf->Cell(130,10,'Bureau or Department where you will be apppointed,, ',0,0,'L',false);
$pdf->SetXY(8,$marginTop+12);
$pdf->Cell(130,10,'a. within the third degree?',0,0,'L',false);
$pdf->SetXY(8,$marginTop+16);
$pdf->Cell(130,10,'b. within the fourth degree (for Local Government Unit - Career Employees)?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,33,'',1,0,'L',false);

//BOX ROW1
$pdf->SetXY(140,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['consanguinity_a'])){
    if($survey['consanguinity_a'] == 'Yes'){
        $survey_answer_width = 140;
    }
    elseif($survey['consanguinity_a'] == 'No'){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+16.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}


if(isset($survey['consanguinity_b'])){
    if (strpos($survey['consanguinity_b'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width-3,$marginTop+28.5);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['consanguinity_b'])[1],0,'','L',false);
    }
    elseif($survey['consanguinity_b'] == "No"){
        $survey_answer_width = 155;
    }

    $pdf->SetXY($survey_answer_width,$marginTop+21.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}


$pdf->SetXY(140,$marginTop+20);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+20);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);

$pdf->SetXY(155,$marginTop+20);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+20);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);
//

$pdf->SetXY(135,$marginTop+22);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+26);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);


////ROW2
$marginTop += 33;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,17,'','TLR',0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'35.  a. Have you ever been found guilty of any administrative offense?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,17,'',1,0,'L',false);

$pdf->SetXY(140,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['offense_a'])){
    if (strpos($survey['offense_a'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width-3,$marginTop+13);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['offense_a'])[1],0,0,'L',false);
    }
    elseif($survey['offense_a'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+4.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}
//

$pdf->SetXY(135,$marginTop+6);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+10);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);

////ROW3
$marginTop += 17;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,22,'','BLR',0,'L',true);

$pdf->SetXY(8,$marginTop);
$pdf->Cell(130,10,'b. Have you been criminally charged before any court?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,22,'',1,0,'L',false);


$pdf->SetXY(140,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['offense_b'])){
    if (strpos($survey['offense_b'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width+20,$marginTop+13);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['offense_b'])[1],0,0,'L',false);
        $pdf->SetXY($survey_answer_width+28,$marginTop+17);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['offense_b'])[2],0,0,'L',false);
    }
    elseif($survey['offense_b'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+4.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(135,$marginTop+6);
$pdf->Cell(70,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(145,$marginTop+10);
$pdf->Cell(80,10,'Date Filed:_________________________________',0,0,'L',false);
$pdf->SetXY(145,$marginTop+14);
$pdf->Cell(80,10,'Status of Case/s:____________________________',0,0,'L',false);


////ROW4
$marginTop += 22;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,19,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,19,'',1,0,'L',false);


$pdf->SetXY(140,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['convicted'])){
    if (strpos($survey['convicted'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width-3,$marginTop+13.5);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['convicted'])[1],0,0,'L',false);
    }
    elseif($survey['convicted'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+4.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

//CHECK
$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+11);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);

////ROW5
$marginTop += 19;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,19,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'37. Have you ever been separated from the service in any of the following modes: resignation,',0,0,'L',false);
$pdf->SetXY(3,$marginTop+4);
$pdf->Cell(130,10,'      retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased',0,0,'L',false);
$pdf->SetXY(3,$marginTop+8);
$pdf->Cell(130,10,'      out (abolition) in the public or private sector?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,19,'',1,0,'L',false);


$pdf->SetXY(140,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['separated'])){
    if (strpos($survey['separated'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width-3,$marginTop+13.5);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['separated'])[1],0,0,'L',false);
    }
    elseif($survey['separated'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+4.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+11);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);

////ROW6
$marginTop += 19;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,30,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'38. a. Have you ever been a candidate in a national or local election held within the last year (except',0,0,'L',false);
$pdf->SetXY(3,$marginTop+4);
$pdf->Cell(130,10,'      Barangay election)?',0,0,'L',false);
$pdf->SetXY(3,$marginTop+16);
$pdf->Cell(130,10,'      b. Have you resigned from the government service during the three (3)-month period before the',0,0,'L',false);
$pdf->SetXY(3,$marginTop+20);
$pdf->Cell(130,10,'      last election to promote/actively campaign for a national or local candidate?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,30,'',1,0,'L',false);


$pdf->SetXY(140,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['government_a'])){
    if (strpos($survey['government_a'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width+20,$marginTop+10);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['government_a'])[1],0,0,'L',false);
    }
    elseif($survey['government_a'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+4.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+7);
$pdf->Cell(80,10,'__________________________',0,0,'L',false);

//CHECK
if(isset($survey['government_b'])){
    if (strpos($survey['government_b'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width+20,$marginTop+25);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['government_b'])[1],0,0,'L',false);
    }
    elseif($survey['government_b'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+20.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}


$pdf->SetXY(140,$marginTop+19);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+19);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);

$pdf->SetXY(155,$marginTop+19);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+19);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

$pdf->SetXY(135,$marginTop+22);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+22);
$pdf->Cell(80,10,'__________________________',0,0,'L',false);

////ROW7
$marginTop += 30;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,19,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'39. Have you acquired the status of an immigrant or permanent resident of another country?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,19,'',1,0,'L',false);


$pdf->SetXY(140,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
////
$pdf->SetXY(155,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+3);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

//CHECK
if(isset($survey['immigrant'])){
    if (strpos($survey['immigrant'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width-3,$marginTop+14);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['immigrant'])[1],0,0,'L',false);
    }
    elseif($survey['immigrant'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+4.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+11);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);

////ROW8
$marginTop += 19;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,44,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'40. Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA',0,0,'L',false);
$pdf->SetXY(3,$marginTop+4);
$pdf->Cell(130,10,'      7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:',0,0,'L',false);
$pdf->SetXY(3,$marginTop+12);
$pdf->Cell(130,10,'      a. Are you a member of any indigenous group?',0,0,'L',false);

//CHECK
if(isset($survey['indigenous_a'])){
    if (strpos($survey['indigenous_a'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width+20,$marginTop+19);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['indigenous_a'])[1],0,0,'L',false);
    }
    elseif($survey['indigenous_a'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+16.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(3,$marginTop+22);
$pdf->Cell(130,10,'      b. Are you a person with disability?',0,0,'L',false);
//CHECK
if(isset($survey['indigenous_b'])){
    if (strpos($survey['indigenous_b'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width+20,$marginTop+29);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['indigenous_b'])[1],0,0,'L',false);
    }
    elseif($survey['indigenous_b'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+26.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(3,$marginTop+32);
$pdf->Cell(130,10,'      c. Are you a solo parent?',0,0,'L',false);
//CHECK
if(isset($survey['indigenous_c'])){
    if (strpos($survey['indigenous_c'], 'Yes') !== false) {
        $survey_answer_width = 140;
        $pdf->SetXY($survey_answer_width+20,$marginTop+39);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell($boxWidth,$boxHeight,explode('-',$survey['indigenous_c'])[1],0,0,'L',false);
    }
    elseif($survey['indigenous_c'] == "No"){
        $survey_answer_width = 155;
    }
    $pdf->SetXY($survey_answer_width,$marginTop+36.5);
    $pdf->SetFont('ZapfDingbats','', 7);
    $pdf->Cell(0, 0, 4, 0, 0);
    $pdf->SetFont('Arial','',8);
}

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,44,'',1,0,'L',false);

$pdf->SetXY(140,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);

$pdf->SetXY(145,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
$pdf->SetXY(155,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+15);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

$pdf->SetXY(135,$marginTop+16);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+16);
$pdf->Cell(80,10,'__________________________',0,0,'L',false);

$pdf->SetXY(140,$marginTop+25);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+25);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
$pdf->SetXY(155,$marginTop+25);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+25);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

$pdf->SetXY(135,$marginTop+26);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+26);
$pdf->Cell(80,10,'__________________________',0,0,'L',false);

$pdf->SetXY(140,$marginTop+35);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(145,$marginTop+35);
$pdf->Cell($boxWidth,$boxHeight,'Yes',0,0,'L',false);
$pdf->SetXY(155,$marginTop+35);
$pdf->Cell($boxWidth,$boxHeight,'',1,0,'L',false);
$pdf->SetXY(160,$marginTop+35);
$pdf->Cell($boxWidth,$boxHeight,'No',0,0,'L',false);

$pdf->SetXY(135,$marginTop+36);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+36);
$pdf->Cell(80,10,'__________________________',0,0,'L',false);


//REFERENCES
$marginTop += 44;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(152,7,'',1,0,'L',true);
$pdf->SetXY(3,$marginTop);
$pdf->Cell(152,7,'41.  REFERENCES',1,0,'L',false);

$pdf->SetTextColor(237,28,36);
$pdf->SetXY(30,$marginTop);
$pdf->Cell(152,7,'(Person not related by consanguinity or affinity to applicant/appointee)',0,0,'L',false);
$pdf->SetTextColor(0,0,0);

$marginTop += 7;
$referenceWidth = [60,60,32];
$referenceColumn = ["NAME","ADDRESS","TEL. NO."];


$pdf->SetXY(165,$marginTop);
$pdf->Cell(40,38,'',1,0,'L',false);

$photoNote = [
    "ID picture taken within",
    "the last 6 months",
    "3.5 cm. X. 4.5 cm",
    "(passport size)",
    "",
    "With full and handwritten",
    "name tag and signature over",
    "printed name",
    "",
    "Computer generated",
    "or photocopied picture",
    "is not acceptable",
    "",
    "PHOTO"
];

$marginTopTemp = $marginTop+1;
$pdf->SetFont('Arial','',6);
for( $row=0; $row<count($photoNote); $row++ ){
    $pdf->SetXY(165,$marginTopTemp);
    $pdf->Cell(40,3,$photoNote[$row],0,0,'C',false);
    $marginTopTemp += 3;
}
$pdf->SetFont('Arial','',8);

$referenceKey = ['name','address','tel'];
$referenceLetter = ['','a','b','c'];
for($row=0; $row<4; $row++){
    $referenceMarginLeft = 3;
    for($col=0; $col<3; $col++){
        if( $row == 0 ){
            $content = $referenceColumn[$col];
        } else {
            $pdf->SetFont('Arial','B',6);
            $content = $survey['reference_'.$referenceKey[$col].'_'.$referenceLetter[$row]];
        }
        $pdf->SetXY($referenceMarginLeft,$marginTop);
        $pdf->Cell($referenceWidth[$col],7,$content,1,0,'C',false);
        $referenceMarginLeft += $referenceWidth[$col];
    }
    $marginTop += 7;
}

$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetFont('Arial','',8);
$pdf->SetXY(3,$marginTop);
$pdf->Cell(152,26,'',1,0,'L',true);

$contentRefrence = [
    "I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and",
    "complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.",
    "I authorize the agency head / authorized representative to verify/validate the contents stated herein. I  agree that any",
    "misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s",
    "against me."
];


for($row=0; $row<count($contentRefrence); $row++){
    $pdf->SetXY(3,$marginTop);
    $pdf->Cell(152,7,$contentRefrence[$row],0,0,'L',false);
    $marginTop += 4;
}
$marginTop += 8;

$contentReference1 = [
    "",
    "",
    "",
    ""
];

$pdf->SetFont('Arial','',6);
$pdf->SetXY(78,$marginTop);
$pdf->Cell(77,28,'',1,0,'L',false);
$pdf->SetXY(78,$marginTop+14);
$pdf->Cell(77,4,'Signature (Sign inside the box)',1,0,'C',true);
$pdf->SetXY(78,$marginTop+24);
$pdf->Cell(77,4,'Date Accomplished',1,0,'C',true);
$pdf->SetXY(160,$marginTop-7);
$pdf->Cell(50,35,'',1,0,'L',false);
$pdf->SetFont('Arial','',7);
$pdf->SetXY(160,$marginTop+23);
$pdf->Cell(50,5,'Right Thumbmark',1,0,'C',true);

$idNote = [
    "Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's",
    "License, etc.) PLEASE INDICATE ID Number and Date of Issuance",
    "Government Issued ID: ",
    "ID/License/Passport No.: ",
    "Date/Place of Issuance:",
];

$pdf->SetFont('Arial','',6);
$idNoteMarginTop = [-1.5,3,6,6,6];
$idNoteResult = ['','','government_id','passport_no','date_insurance'];
$idNoteMarginTopFinal = $marginTop;
for($row=0;$row<count($idNote);$row++){
    $idNoteMarginTopFinal += $idNoteMarginTop[$row];
    $pdf->SetXY(3,$idNoteMarginTopFinal);
    $pdf->Cell(70,7,$idNote[$row],0,0,'L',false);

    if(isset($survey[$idNoteResult[$row]])){
        $result = $survey[$idNoteResult[$row]];
    } else {
        $result = '';
    }
    $pdf->SetFont('Arial','B',6);
    $pdf->SetXY(27,$idNoteMarginTopFinal);
    $pdf->Cell(70,7,$result,0,0,'L',false);
    if($row+1 == count($idNote)) {
        $pdf->SetXY(27,$idNoteMarginTopFinal+3);
        $pdf->Cell(70,7,$survey['place_insurance'],0,0,'L',false);
    }
    $pdf->SetFont('Arial','',6);
}

for($row=0; $row<count($contentReference1); $row++){
    $pdf->SetXY(3,$marginTop);
    $pdf->Cell(70,7,'',1,0,'L',false);
    $marginTop += 7;
}

$marginTop += 4;
$pdf->SetXY(3,$marginTop);
$pdf->Cell(210,36.5,'',1,0,'L',false);
$pdf->SetXY(6,$marginTop+2);
$pdf->Cell(210,3,'SUBSCRIBED AND SWORN to before me this   _______________________________ , affiant exhibiting his/her validly issued government ID as indicated above.',0,0,'L',false);
$pdf->SetFont('Arial','',6);
$pdf->SetXY(73,$marginTop+6);
$pdf->Cell(100,15,'',1,0,'L',false);
$pdf->SetFont('Arial','',7);
$pdf->SetXY(73,$marginTop+20);
$pdf->Cell(100,5,'Person Administering Oath',1,0,'C',true);


?>