<?PHP
	include "../../config.php";
	require_once '../../Model/commande.php';

	class commandeC {
		
		
		
		function ajoutercommande($commande){
			$sql="INSERT Into commande (id_panier  , prix , mode_paiement) 
			VALUES (:id_panier  , :prix , :mode_paiement)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'id_panier' => $commande->getId_panier(),
					'prix' => $commande->getPrix(),
                    'mode_paiement' => $commande->getMode_paiement()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affichercommande(){
			
			$sql="SELECT * FROM commande ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function search($str){
			
			$sql="SELECT * FROM commande where id_panier like '%".$str."%' or prix like '%".$str."%' or mode_paiement like '%".$str."%' ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

        function TriASC(){
			
			$sql="SELECT * FROM commande ORDER BY prix ASC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function TriDESC(){
			
			$sql="SELECT * FROM commande ORDER BY prix DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

	

		function supprimercommande($id){
			$sql="DELETE FROM commande WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifiercommande($commande, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commande SET
                        prix = :prix,
                        mode_paiement = :mode_paiement
					WHERE id = :id'
				);
				$query->execute([
                    'prix' => $commande->getPrix(),
                    'mode_paiement' => $commande->getMode_paiement(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperercommande($id){
			$sql="SELECT * from commande where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
		
	}

?>