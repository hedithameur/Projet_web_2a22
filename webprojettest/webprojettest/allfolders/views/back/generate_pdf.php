<?php

require('fpdf182/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=firstproject', 'root', '123456789*-');
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6);
        $this->SetFont('Arial', 'B', 16);
        $this->ln();
        $this->SetFont('Times', '', 20);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(150, 8, 'Statistique Comments', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);

        $this->ln();
    }
    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);

        $this->ln();
    }
}

$pdf = new PDF();
//header
$pdf->AddPage('L', 'A4', 0);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 12);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
