<?php
	include '../../Controller/ProduitC.php';
	$produitC=new produitC();
	$produitC->supprimerproduit($_GET["id"]);
	header('Location:afficherListeProduits.php');
?>