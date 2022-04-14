<?php
	include 'config.php';
	include_once 'reclamation.php';
	class reclamationC {
		function afficherreclamations(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimereclamation($id_rec){
			$sql="DELETE FROM reclamation WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id_rec);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (nom, id,texte, date_rec) 
			VALUES (:nom,:id,:texte,:date_rec )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom' => $reclamation->getnom(),
					'id' => $reclamation->getID(),
					'texte' => $reclamation->getText(),
					'date_rec' => $reclamation->getdate()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreclamation($id_rec){
			$sql="SELECT * from reclamation where id=$id_rec";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreclamation($reclamation, $id_rec){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						nom= :nom, 
				       texte= :texte, 
						date_rec= :date_rec
						
					WHERE id= :id'
				);
				$query->execute([
					'nom' => $reclamation->getnom(),
					'texte' => $reclamation->getText(),
					'date_rec' => $reclamation->getdate(),
					'id'=>$id_rec
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>