<?php

// Our Controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This is important to add here.
use PDF;

class PDFController extends Controller
{
    public function printPDF()
    {
        // This  $data array will be passed to our PDF blade
        $data = [
            'title' => 'SCMed',
            'heading' => 'Consulta',
            'content' => 'Report. '
            ];

        $pdf = PDF::loadView('pdfView', $data);
        return $pdf->download('consulta.pdf');
    }
}
