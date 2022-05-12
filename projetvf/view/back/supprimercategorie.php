<?php
	include '../../Controller/CategorieC.php';
	$categorieC=new categorieC();
	$categorieC->supprimercategorie($_GET["idC"]);
	header('Location:afficherListeProduits.php');
?>