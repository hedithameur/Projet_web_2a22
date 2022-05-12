<?php
	include '../Controller/LivraisonC.php';
	$LivraisonC=new LivraisonC();
	$LivraisonC->supprimerLivraison($_GET["AUTO_ID"]);
	header('Location:afficherListeLivraison.php');
?>