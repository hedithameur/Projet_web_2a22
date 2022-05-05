<?php

include_once 'CommentairesC.php';

if (isset($_GET['idCommentaire'])) {
	$commentairesC = new CommentairesC();
	$commentairesC->supprimerCommentaire($_GET['idCommentaire']);

	if (isset($_GET['idUsers'])) {
		$id = $_GET['idNewsArticle'];
		header("location: ../views/front/blogs-details.php?idNewsArticle=$id");
	} else {
		header('location: ../views/back/consultercommentaires.php');
	}
} else {
	echo 'Erreur : try again';
}
