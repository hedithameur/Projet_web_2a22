<?php

require_once "C://xampp/htdocs/webprojettest/allfolders/config.php";
require_once 'C://xampp/htdocs/webprojettest/allfolders/model/Commentaire.php';

class CommentairesC
{
	public function ajouterCommentaire($c, $idS, $idU)
	{
		$sql = 'INSERT INTO commentaire (texte,dateCommentaire,idNewsArticle,idUsers) VALUES (:texte,:dateCommentaire,:idNewsArticle,:idUsers)';
		$db = config::getConnexion();
		//$req = $db->prepare($sql);

		//$req->bindValue(':texte', $c->getTexte());
		//	$req->bindValue(':dateCommentaire', $c->getDateCommentaire());
		//	$req->bindValue(':idNewsArticle', $idS);
		//$req->bindValue(':idUsers', $idU);
		//$req->execute();

		try {
			$query = $db->prepare($sql);

			$query->execute([
				'texte' => $c->getTexte(),
				'dateCommentaire' => $c->getDateCommentaire(),
				'idNewsArticle' => $idS,
				'idUsers' => $idU

			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}


	public function afficherCommentaires()
	{
		$db = config::getConnexion();
		$sql = 'SELECT c.idCommentaire , c.idUsers ,c.idNewsArticle, c.texte , c.dateCommentaire ,u.nameUsers , u.lastnameUsers, a.titre, a.urlImage FROM commentaire c, users u ,newsarticle a
			WHERE c.idUsers = u.idUsers AND c.idNewsArticle = a.idNewsArticle ';
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}


	public function afficherCommentairesarticle($idS)
	{
		$db = config::getConnexion();
		$sql = 'SELECT a.idNewsArticle, u.nameUsers,u.lastnameUsers,c.texte,c.dateCommentaire,c.idCommentaire,c.idUsers FROM commentaire as c
				INNER JOIN users as u 
				INNER JOIN newsarticle as a
				ON c.idUsers = u.idUsers AND c.idNewsArticle = a.idNewsArticle AND a.idNewsArticle = :idNewsArticle;';
		$req = $db->prepare($sql);
		$req->bindValue(':idNewsArticle', $idS);
		$req->execute();
		$result = $req->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}


	public function supprimerCommentaire($idC)
	{
		$db = config::getConnexion();
		$sql = 'DELETE FROM commentaire WHERE idCommentaire = :idCommentaire';
		$req = $db->prepare($sql);
		$req->bindValue(':idCommentaire', $idC);
		$req->execute();
	}


	public function verifierCommentaire($texte)
	{

		$words = explode(" ", $texte);
		$words = array_map('strtolower', $words);

		$notAllowed = array('shit', 'noob', 'fuck', 'damn', 'hell', 'crap', 'idiot');

		$result = array_intersect($words, $notAllowed);

		if (count($result) != 0) {
			return 0;
		} else {
			return 1;
		}
	}

	/*
	public function findNextAutoIncrementId()
	{
		$db = config::getConnexion();
		$sql = "SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES
					WHERE table_name = 'commentaire';";
		$req = $db->prepare($sql);
		$req->execute();
		$result = $req->fetch(PDO::FETCH_OBJ);
		return $result;
	}*/

	public function nbrCommentairesTotale()
	{
		$sql = "SELECT COUNT(*) AS sum FROM commentaire";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->execute();
		$result = $req->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function nbrCommentairesbyarticle($ida)
	{
		$sql = "SELECT COUNT(*) AS sum FROM commentaire  WHERE idNewsArticle = :idNewsArticle;";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':idNewsArticle', $ida);
		$req->execute();
		$result = $req->fetch(PDO::FETCH_OBJ);
		return $result;
	}
}
