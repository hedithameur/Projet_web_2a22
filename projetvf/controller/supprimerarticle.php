<?php
include "ajouterArticle.php";

$articles = new articleC();

if (isset($_POST['idNewsArticle'])) {
    $articles->supprimerarticle($_POST['idNewsArticle']);
    header('location:../views/back/editerarticle.php');
} else {
    echo 'Erreur : try again';
    echo $_POST['idNewsArticle'];
}
