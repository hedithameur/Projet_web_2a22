<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("functions.php");

// get paiement
$query = "SELECT * FROM commande";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$commande = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $commande[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=commande.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('id', 'id_panier', 'prix', 'date', 'mode_paiement'));

if (count($commande) > 0) {
    foreach ($commande as $row) {
        fputcsv($output, $row);
    }
}
?>