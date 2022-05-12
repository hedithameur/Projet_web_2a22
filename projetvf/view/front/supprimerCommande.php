<?PHP
	include_once "../../controller/commandeC.php";


		$VoitureC=new commandeC();
		
		
		if (isset($_GET["id"])){
			$VoitureC->supprimercommande($_GET["id"]);
			header('Location: commandes.php');
		}
	
?>