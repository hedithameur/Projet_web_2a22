<?php
	include 'reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimereclamation($_GET["id"]);
	header('Location:afficherListereclamations.php');
?>