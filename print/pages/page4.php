<?php
$marginTop = 10;
$boxWidth = 4;
$boxHeight = 3;
$pdf->SetFont('Arial','',8);

$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,35,'','1',0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the',0,0,'L',false);
$pdf->SetXY(8,$marginTop+4);
$pdf->Cell(130,10,'chief of bureau or office or to the person who has immediate supervision over you in the Office, ',0,0,'L',false);
$pdf->SetXY(8,$marginTop+8);
$pdf->Cell(130,10,'chief of bureau or office or to the person who has immediate supervision over you in the Office, ',0,0,'L',false);
$pdf->SetXY(8,$marginTop+12);
$pdf->Cell(130,10,'a. within the third degree?',0,0,'L',false);
$pdf->SetXY(8,$marginTop+16);
$pdf->Cell(130,10,'b. within the fourth degree (for Local Government Unit - Career Employees)?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,35,'',1,0,'L',false);

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
$pdf->SetXY(140,$marginTop+16.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+16.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


//BOX ROW2
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
$marginTop += 35;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,20,'','TLR',0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'35  a. Have you ever been found guilty of any administrative offense?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,20,'',1,0,'L',false);

//BOX ROW3
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
$pdf->SetXY(140,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


$pdf->SetXY(135,$marginTop+6);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+10);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);


////ROW3
$marginTop += 20;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,25,'','BLR',0,'L',true);

$pdf->SetXY(8,$marginTop);
$pdf->Cell(130,10,'b. Have you been criminally charged before any court?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,25,'',1,0,'L',false);


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
$pdf->SetXY(140,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


$pdf->SetXY(135,$marginTop+6);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+10);
$pdf->Cell(80,10,'Date Filed:__________________',0,0,'L',false);
$pdf->SetXY(152.5,$marginTop+14);
$pdf->Cell(80,10,'Status of Case/s:__________________',0,0,'L',false);


////ROW4
$marginTop += 25;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,25,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,25,'',1,0,'L',false);


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
$pdf->SetXY(140,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+11);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);

////ROW5
$marginTop += 25;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,25,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'37. Have you ever been separated from the service in any of the following modes: resignation,',0,0,'L',false);
$pdf->SetXY(3,$marginTop+4);
$pdf->Cell(130,10,'      retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased',0,0,'L',false);
$pdf->SetXY(3,$marginTop+8);
$pdf->Cell(130,10,'      out (abolition) in the public or private sector?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,25,'',1,0,'L',false);


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
$pdf->SetXY(140,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+11);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);


////ROW6
$marginTop += 25;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,35,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'38. a. Have you ever been a candidate in a national or local election held within the last year (except',0,0,'L',false);
$pdf->SetXY(3,$marginTop+4);
$pdf->Cell(130,10,'      Barangay election)?',0,0,'L',false);
$pdf->SetXY(3,$marginTop+16);
$pdf->Cell(130,10,'      b. Have you resigned from the government service during the three (3)-month period before the',0,0,'L',false);
$pdf->SetXY(3,$marginTop+20);
$pdf->Cell(130,10,'      last election to promote/actively campaign for a national or local candidate?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,35,'',1,0,'L',false);


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
$pdf->SetXY(140,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(160,$marginTop+7);
$pdf->Cell(80,10,'__________________________',0,0,'L',false);


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
$marginTop += 35;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,25,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'39. Have you acquired the status of an immigrant or permanent resident of another country?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,25,'',1,0,'L',false);


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
$pdf->SetXY(140,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);
//
$pdf->SetXY(155,$marginTop+4.5);
$pdf->SetFont('ZapfDingbats','', 7);
$pdf->Cell(0, 0, 4, 0, 0);
$pdf->SetFont('Arial','',8);


$pdf->SetXY(135,$marginTop+7);
$pdf->Cell(80,10,'if YES, give details:',0,0,'L',false);
$pdf->SetXY(135,$marginTop+11);
$pdf->Cell(80,10,'___________________________________________',0,0,'L',false);


////ROW8
$marginTop += 25;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,50,'',1,0,'L',true);

$pdf->SetXY(3,$marginTop);
$pdf->Cell(130,10,'40. Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA',0,0,'L',false);
$pdf->SetXY(3,$marginTop+4);
$pdf->Cell(130,10,'      7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:',0,0,'L',false);
$pdf->SetXY(3,$marginTop+12);
$pdf->Cell(130,10,'      a. Are you a member of any indigenous group?',0,0,'L',false);
$pdf->SetXY(3,$marginTop+22);
$pdf->Cell(130,10,'      b. Are you a person with disability?',0,0,'L',false);
$pdf->SetXY(3,$marginTop+32);
$pdf->Cell(130,10,'      b. Are you a solo parent?',0,0,'L',false);

$pdf->SetXY(133,$marginTop);
$pdf->Cell(80,50,'',1,0,'L',false);


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
$marginTop += 50;
$pdf->SetFillColor(202, 202, 202); //GRAY
$pdf->SetXY(3,$marginTop);
$pdf->Cell(150,7,'',1,0,'L',true);
$pdf->SetXY(3,$marginTop);
$pdf->Cell(150,7,'41.  REFERENCES',1,0,'L',false);

$pdf->SetTextColor(237,28,36);
$pdf->SetXY(30,$marginTop);
$pdf->Cell(150,7,'(Person not related by consanguinity or affinity to applicant/appointee)',0,0,'L',false);

?>