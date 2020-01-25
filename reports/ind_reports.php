<?php

use setasign\Fpdi\Fpdi;

require '../vendor/autoload.php';

require '../includes/fpdf17/fpdf.php';

class PDF extends FPDF
{

    function Header()
    {
        $this->SetFont('Times','',16);
        //Setting the reports top margin
        $this->SetMargins(20,20,20);

        // Setting the reports title
        $this->SetTitle("Class Report",true);

        // Add an image
        $this->Image('../images/WhatsApp Image 2019-10-31 at 2.05.43 PM.jpeg', 90, 10, 30);
    }


    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Times','I',8);
        // Text color in gray
        $this->SetTextColor(128);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

}

$pdf = new PDF();
$pdf->AddPage('P','A4');

$pdf->AddFont('Times');
$pdf->Cell(195,30,'',0,1);

// /**
//  * @param PDF $pdf
//  */
// function set_first_row(PDF $pdf)
// {
//     for ($i = 0; $i <= 35; $i++) {
//         $pdf->Cell(7, 30, '', 1, 0);
//     }
//     $pdf->Ln();
// }

// set_first_row($pdf);




// /**
//  * @param PDF $pdf
//  */
// function set_second_row(PDF $pdf)
// {
//     $data = [
//         40,30,30,30,30,30,30,40,30,30,30,30,30,30,40,30,30,30,30,30,30
//     ];

//     for ($i = 0; $i <= count($data); $i++) {

//         foreach ($data as $cell)
//             $pdf->Cell(7, 7, $cell[$i], 1, 0);

//     }
//     $pdf->Ln();
// }

// set_second_row($pdf);

$pdf->Output();