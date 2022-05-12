<?php
	include '../config.php';
	include_once '../Model/client.php';
	class clientC {
		function afficherclients(){
			$sql="SELECT * FROM client";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerclient($IdClient){
			$sql="DELETE FROM client WHERE IdClient=:IdClient";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdClient', $IdClient);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterclient($client){
			$sql="INSERT INTO client (IdClient, Nom, Prenom, pasword, Email,telephone ) 
			VALUES (:IdClient,:Nom,:Prenom, :pasword,:Email, :telephone)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'IdClient' => $client->getIdclient(),
					'Nom' => $client->getNom(),
					'Prenom' => $client->getPrenom(),
					'pasword' => $client->getpasword(),
					'Email' => $client->getEmail(),
					'telephone' => $client->gettelephone()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererclient($IdClient){
			$sql="SELECT * from client where IdClient=$IdClient";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$client=$query->fetch();
				return $client;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierclient($client, $idclient){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE client SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						pasword= :pasword, 
						Email= :Email, 
						telephone= :telephone
					WHERE IdClient= :IdClient'
				);
				$query->execute([
					'Nom' => $client->getNom(),
					'Prenom' => $client->getPrenom(),
					'pasword' => $client->getpasword(),
					'Email' => $client->getEmail(),
					'telephone' => $client->gettelephone(),
					'IdClient' => $idclient
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>