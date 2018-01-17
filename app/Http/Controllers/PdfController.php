<?php

namespace PIS\Http\Controllers;

use Crabbly\FPDF\FPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PIS\Designation;
use PIS\Division;
use PIS\Section;
use PIS\User_dts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PdfController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $fpdf = new \Codedge\Fpdf\Fpdf\Fpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Cell(40,10,'Hello World!');
        $fpdf->Output();
        exit;
    }

}
