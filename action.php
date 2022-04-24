<?php
    include_once '../../config.php';
    include_once '../../Model/Produit.php';
    include_once '../../Model/Categorie.php';
    include_once '../../Controller/ProduitC.php';
    include_once '../../Controller/CategorieC.php';

    if(isset($_GET['t'],$_GET['matricule'])  AND !empty($_GET['t'] ) AND !empty($_GET['matricule']))
    {
        $getid = $_GET['matricule'];
        $gett = (int)$_GET['t'];
        $check = $bdo->prepare("SELECT matricule FROM produit WHERE matricule =? ");
        $check->execute(array($getid));

        if($check->rowCount()==1)
        {
            if($gett == 1)
            {
                $ins = $bdo->prepare("INSERT INTO likes (id_produit) VALUES (?) ");
                $ins->execute(array($getid));
            }
            elseif($gett == 2)
            {
                $ins = $bdo->prepare("INSERT INTO dislikes (id_produit) VALUES (?) ");
                $ins->execute(array($getid));
            }
            header('Location:vehicle.php');
            
        }else
        {
            exit('Erreur fatale');
        }
    }else
    {
        exit('Erreur fatale. revenir');
    }