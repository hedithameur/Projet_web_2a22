<?php
include '../../model/commande.php'; 
include_once "../../controller/commandeC.php";

if (
    
    isset($_GET['id_produit']) &&
    isset($_GET['prix']) 

    ) {
       // $commande = new commande(1,$_GET['Qte'],$_GET['id_produit'],$_GET['prix']);
        $commande = new commande(0,$_GET['id_produit'],$_GET['prix'],"paiement a livraison");

		$commandec = new commandeC();
        $commandec->ajoutercommande($commande);
        header('Location: commandes.php');
}


?>