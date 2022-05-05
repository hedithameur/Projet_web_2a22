<?php
	include_once 'config.php';
	include_once 'Categorie.php';
	class categorieC 
{

	function ajoutercategorie($categorie)
	{
	$sql="INSERT INTO categorie (id,nomC) VALUES (:idC, :nomC)";
	$db = config::getConnexion();
	try{
		$query = $db->prepare($sql);
		$query->execute([
			'idC' => $categorie->getidC(),
			'nomC' => $categorie->getnomC()
		]);			
	}
	catch (Exception $e){
		echo 'Erreur: '.$e->getMessage();
	}			
	}
	
    function affichercategorie()
    {
		$sql="SELECT * FROM categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function modifiercategorie($categorie, $idC)
	{
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    nomC= :nomC
                WHERE id= :idC'
            );
            $query->execute([
                'nomC' => $categorie->getnomC(),
                'idC' => $idC
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function supprimercategorie($idC)
	{
        $sql="DELETE FROM categorie WHERE id=:idC";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idC', $idC);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    


	function recuperercategorie($idC){
		$sql="SELECT * from categorie WHERE id= '$idC'";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
				$query->execute();

				$cat=$query->fetch();
				return $cat;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}



	

	public function afficherproduit($idC)
    {
		try{
			$pdo = getConnexion();
			$query = $pdo -> prepare('SELECT * FROM produit WHERE categorie = :id');
			$query -> execute(['id' => $idC]);
		return $query -> fetchAll();
		}
        catch (PDOException $e){
            $e->getMessage();
        }	
    }



}


    

?>