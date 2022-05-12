<?php
include '../../model/panierLine.php'; 
include_once "../../controller/panierC.php";

if (
    isset($_GET['id_produit']) &&
    isset($_GET['prix']) 
    ) {
        $panierLine = new panierLine(1,1,$_GET['id_produit'],$_GET['prix']);

		$panierc = new panierC();
        $panierc->ajouterpanierline($panierLine);
        header('Location: panier.php');
}


?>