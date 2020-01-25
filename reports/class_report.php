<?php

use setasign\Fpdi\Fpdi;

require_once ('../vendor/autoload.php');
require_once ('../includes/fpdf17/fpdf.php');

class PDF extends FPDF
{
// Load data $this->SetFont('Times','',16);
        //Setting the reports top margin
        $this->SetMargins(20,20,20);

        // Setting the reports title
        $this->SetTitle("Class Report",true);

        // Add an image
        $this->Image('../images/WhatsApp Image 2019-10-31 at 2.05.43 PM.jpeg', 135, 10, 20);
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

        function Header(){
            $this->SetFont('Times','',16);
            //Setting the reports top margin
            $this->SetMargins(20,20,20);

            // Setting the reports title
            $this->SetTitle("Class Report",true);

            // Add an image
            $this->Image('../images/WhatsApp Image 2019-10-31 at 2.05.43 PM.jpeg', 135, 10, 20);
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

// Colored table
    function FancyTable($header, $data)
    {
        $this->first_font_declaration();
        $w = $this->set_Headings($header);

        $this->font_declaration();
        $this->set_Data_Rows($data, $w);

        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    public function font_declaration()
    {
// Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
    }

    public function first_font_declaration()
    {
// Colors, line width and bold font
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Times', 'B');
    }

    /**
     * @param $data
     * @param array $w
     */
    public function set_Data_Rows($data, array $w)
    {
// Data
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0] / 3, 6, $row[0], 1, 0, 'L', $fill);
            $this->Cell($w[1] / 3, 6, $row[1], 1, 0, 'L', $fill);
            $this->Cell($w[2] / 3, 6, number_format($row[2]), 1, 0, 'R', $fill);
//                $this->Cell($w[3]/3, 6, number_format($row[3]), 1, 0, 'R', $fill);
//                $this->Ln();
            $fill = !$fill;
        }
    }

    /**
     * @param $header
     * @return array
     */
    public function set_Headings($header)
    {
// Header
        $w = array(30, 30, 30, 30, 30);

        for ($i = 0; $i < count($header); $i++)

            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();

        return $w;
    }
}

$pdf = new PDF();
// Column headings
$header = array('Maths', 'English','Kiswahili', 'Science','Social Studies');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Times', '', 14);
$pdf->AddPage('L');
$pdf->Cell(195,30,'',0,1);
$pdf->FancyTable($header, $data);
$pdf->Output();
