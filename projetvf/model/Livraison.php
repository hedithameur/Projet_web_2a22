<?php
	class Livraison{
		private $AUTO_ID=null;
		private $ID=null;
		private $NOM=null;
		private $ADRESSE=null;
		private $PHONE=null;
		//private $PRODUCT=null;
		
		
		
		function __construct($AUTO_ID ,$ID , $NOM, $ADRESSE, $PHONE){
			$this->AUTO_ID=$AUTO_ID;
			$this->ID=$ID;
			$this->NOM=$NOM;
			$this->ADRESSE=$ADRESSE;
			$this->PHONE=$PHONE;
			
			
		}
		
		function getAUTO_ID(){
			return $this->AUTO_ID;
		}
		function getID(){
			return $this->ID;
		}
		function getNAME(){
			return $this->NOM;
		}
		function getADRESSE(){
			return $this->ADRESSE;
		}
		function getPHONE(){
			return $this->PHONE;
		}
		//function getPRODUCT(){
		//	return $this->PRODUCT;
		//}
		function setAUTO_ID(){
			return $this->AUTO_ID;
		}
		function setID(string $ID){
			$this->ID=$ID;
		}
        function setNAME(string $NOM){
			$this->NOM=$NOM;
		}
		function setADRESSE(string $ADRESSE){
			$this->ADRESSE=$ADRESSE;
		}
		function setPHONE(string $PHONE){
			$this->PHONE=$PHONE;
		}
		//function setPRODUCT(string $PRODUCT){
		//	$this->PRODUCT=$PRODUCT;
		//}
		
		
	}


?>