<?php
use Dompdf\Dompdf;

//require_once '../db.php';
include_once '../../config.php';


ob_start();
require_once 'pdf_content.php';
$html = ob_get_contents();
ob_end_clean();
 

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();


$dompdf->loadHtml($html);

$dompdf->render();

//$fichier ='Admin client';
$fichier ='produit categorie';
$dompdf->stream($fichier);