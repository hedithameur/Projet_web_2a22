<?php
	include '../config.php';
	include_once '../Model/Livraison.php';
	class LivraisonC {
		function afficherLivraison(){
			$sql="SELECT * FROM crud";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerLivraison($AUTO_ID){
			$sql="DELETE FROM crud WHERE AUTO_ID=:AUTO_ID";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':AUTO_ID', $AUTO_ID);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterLivraison($Livraison){
			$sql="INSERT INTO crud (ID,NOM,ADRESSE,PHONE,PRODUCT) VALUES (:ID,:NOM,:ADRESSE,:PHONE,:PRODUCT)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'ID'=> $Livraison->getID(),
                    'NOM'=>$Livraison->getNAME(),
                    'ADRESSE'=>$Livraison->getADRESSE(),
                    'PHONE'=>$Livraison->getPHONE(),
                    'PRODUCT'=>$Livraison->getPRODUCT()
				]);			
			}
			
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function recupererLivraison($AUTO_ID){
			$sql="SELECT * from crud where AUTO_ID=$AUTO_ID";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Livraison=$query->fetch();
				return $Livraison;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierLivraison($Livraison, $AUTO_ID){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE crud SET 
						ID= :ID, 
						NOM= :NOM, 
						ADRESSE= :ADRESSE, 
						PHONE= :PHONE, 
						PRODUCT= :PRODUCT
					WHERE AUTO_ID=:AUTO_ID'
				);
				$query->execute([
					'ID' => $Livraison->getID(),
					'NOM' => $Livraison->getNAME(),
					'ADRESSE' => $Livraison->getADRESSE(),
					'PHONE' => $Livraison->getPHONE(),
					'PRODUCT' => $Livraison->getPRODUCT(),
					'AUTO_ID' => $AUTO_ID
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function afficheradresse(){
			$sql="SELECT DISTINCT ADRESSE FROM crud";
			$db = config::getConnexion();
			try{
				$adresse = $db->query($sql);
				return $adresse;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

	}
?>