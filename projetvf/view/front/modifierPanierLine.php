<?php

if (isset($_POST['id']) &&
    isset($_POST['Qte'])
    ) {
        include_once "../../controller/panierC.php";


		$panierc=new panierC();
        $panierc->modifierpanierline($_POST['id'],$_POST['Qte']);
        header('Location: panier.php');
}


?>