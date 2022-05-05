<?php
	include_once 'config.php';
	include_once 'avis.php';
	class aviC 
{

	function ajouteravi($avi)
	{
	$sql="INSERT INTO avi (id_client,id_produit,aime) 
	VALUES (:id_client, :id_produit, :aime )";
	$db = config::getConnexion();
	try{
		$query = $db->prepare($sql);
		$query->execute([
			'id_client' => $avi->getid_client(),
			'id_produit' => $avi->getid_produit(),
			'aime' => $avi->getaime()
		]);			
	}
	catch (Exception $e){
		echo 'Erreur: '.$e->getMessage();
	}			
	}
	
    function afficheravi()
    {
		$sql="SELECT * FROM avi";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }


    function modifieravi($avi)
	{
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE avi SET 
                    aime= :aime
                WHERE id_client= :id_client AND id_produit=:id_produit'
            );
            $query->execute([
               
               
                'aime' => $avi->getaime(),
                'id_client' => $avi->getid_client(),
                 'id_produit' => $avi->getid_produit()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function supprimeravi($id_produit,$id_client)
	{
        $sql="DELETE FROM avi WHERE id_produit=:id_produit AND id_client=:id_client";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_produit', $id_produit);
        $req->bindValue(':id_client', $id_client);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    



    function recupereravi($id){
        $sql="SELECT * from avi WHERE id_produit= '$id_produit' AND id_client='$id_client'";
		$db = config::getConnexion();
		try{
            $query=$db->prepare($sql);
            $query->execute();

            $avi=$query->fetch();
            return $avi;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


}


    

?>