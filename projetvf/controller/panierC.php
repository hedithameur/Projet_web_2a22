<?php
	include_once ('../../config.php');
	require_once ('../../Model/panier.php');
    require_once('../../Model/panierLine.php');
	class panierC {

		function afficherpanierline($id_user){
			$sql="SELECT * FROM panier_line where id_user=".$id_user;
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function supprimerpanierline($id){
			$sql="DELETE FROM panier_line WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterpanier($id_user){
			$sql="INSERT INTO panier (id_user)
			VALUES (:id_user)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_user' => $id_user
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

        function ajouterpanierline($panierLine){
			$sql="INSERT INTO panier_line (id_user, quantite, id_produit, prix)
			VALUES (:id_user,:quantite,:id_produit, :prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'quantite' => $panierLine->getQuantite(),
					'id_produit' => $panierLine->getId_produit(),
					'prix' => $panierLine->getPrix(),
					'id_user' => $panierLine->getIdUser()

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
        
		function recupererPanierLine($Matricule){
			$sql="SELECT * from panier_line where id=$Matricule";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Voiture=$query->fetch();
				return $Voiture;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererCoupon($coupon){
			$sql="SELECT * from coupon where coupon='".$coupon."'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Voiture=$query->fetch();
				return $Voiture;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function modifierpanierline($id,$Qte){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE panier_line SET 
						quantite= :quantite
					WHERE id= :id'
				);
				$query->execute([
					'quantite' => $Qte,
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>