<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('../db.php');

    // On nettoie l'id envoyé
    $id = $_GET['id'];

    $sql = 'SELECT * FROM `client` WHERE `idclient` = :id';

    // On prépare la requête
    $query = $connection->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $type = $query->fetch();

    // On vérifie si le produit existe
    if(!$type){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: accounts.php');
        die();
    }

    $sql = 'DELETE FROM `client` WHERE `idclient` = :id';

    // On prépare la requête
    $query = $connection->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
   header('Location: accounts.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: accounts.php');
}