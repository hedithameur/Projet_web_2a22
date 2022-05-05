<?php
	include_once 'config.php';
	include_once 'Produit.php';
	class produitC 
{

	function ajouterproduit($produit)
	{
	$sql="INSERT INTO produit (id,marque,modele,image,prix,id_c) 
	VALUES (:id, :marque, :modele, :image,:prix, :id_c)";
	$db = config::getConnexion();
	try{
		$query = $db->prepare($sql);
		$query->execute([
			'id' => $produit->getid(),
			'marque' => $produit->getmarque(),
			'modele' => $produit->getmodele(),
           'image' => $produit->getimage(),
			'prix' => $produit->getprix(),
			'id_c' => $produit->getid_c()
		]);			
	}
	catch (Exception $e){
		echo 'Erreur: '.$e->getMessage();
	}			
	}
	
    function afficherproduit()
    {
		$sql="SELECT * FROM produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function afficherproduitfront()
    {
        if(isset($_GET['page'])){
        $page=(int)$_GET['page'] ;
        }
        
        if($page=="" || $page=="1")
{
        $page1=0;
}
        else
{
        $page1=($page*3)-3;
}    

        $sql="SELECT * FROM produit LIMIT $page1,3";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	 
    }

    function modifierproduit($produit, $id)
	{
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    id= :id, 
                    marque=:marque;
                    modele= :modele, 
                    prix= :prix, 
                    id_c= :id_c
                WHERE id= :id'
            );
            $query->execute([
                'id' => $produit->getid(),
                'marque' => $produit->getmarque(),
                'modele' => $produit->getmodele(),
                'prix' => $produit->getprix(),
                'id_c' => $produit->getid_c(),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function supprimerproduit($id)
	{
        $sql="DELETE FROM produit WHERE id=:id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id', $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    



    function recupererproduit($id){
        $sql="SELECT * from produit WHERE id= '$id'";
		$db = config::getConnexion();
		try{
            $query=$db->prepare($sql);
            $query->execute();

            $produit=$query->fetch();
            return $produit;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


}


    

?>