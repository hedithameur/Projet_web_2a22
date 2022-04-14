<?php
	include '../Controller/clientC.php';
	$clientC=new clientC();
	$clientC->supprimerclient($_GET["IdClient"]);
	header('Location:afficherListeclients.php');
?>