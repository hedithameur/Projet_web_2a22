<?php
	include 'config.php';
	include 'admin.php';

	class adminC {
		function afficheradmin(){
			$sql="SELECT * FROM admin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimeradmin($id_admin){
			$sql="DELETE FROM admin WHERE id_admin=:id_admin";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_admin', $id_admin);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		//function supprimercommentairepararticle($id_article){
			//$sql="DELETE FROM commentaire WHERE id_article=:id_article";
			//$db = config::getConnexion();
			//$req=$db->prepare($sql);
			//$req->bindValue(':id_article', $id_article);
			//try{
			//	$req->execute();
			//}
			//catch(Exception $e){
				//die('Erreur:'. $e->getMeesage());
			//}
			
		//}
		function ajouteradmin($admin){
			$sql="INSERT INTO admin (id_admin, pasword, email, dat) 
			VALUES (:id_admin,:pasword,:email, :dat)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_admin' => $admin->getid_admin(),
					'pasword' => $admin->getpasword(),
					'email' => $admin->getemail(),
					'dat' => $admin->getdat(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereradmin($id_admin){
			$sql="SELECT * from  admin where id_admin=$id_admin";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$admin=$query->fetch();
				return $admin;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieradmin($admin, $id_admin){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE admin SET 
						pasword= :pasword, 
						email= :email, 
						dat= :dat
						
					WHERE id_admin= :id_admin'
				);
				$query->execute([
					 
					'pasword' => $admin->getpasword(),
					'email' => $admin->getemail(),
					'dat' => $admin->getdat(),
					'id_admin' =>$id_admin
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>