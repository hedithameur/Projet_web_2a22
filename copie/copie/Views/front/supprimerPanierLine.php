<?PHP
	include_once "../../controller/panierC.php";


		$VoitureC=new panierC();
		
		
		if (isset($_GET["id"])){
			$VoitureC->supprimerpanierline($_GET["id"]);
			header('Location: panier.php');
		}
	
?>