<?php
	class reclamation{
		private $nom=null;
		private $date=null;
		private $id=null;
		private $text=null;
	
	
		function __construct($nom,  $id, $text, $date){
			
			$this->nom=$nom;
			$this->id=$id;
			$this->text=$text;
			$this->date=$date;
		}
		function getId(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}
		function getdate(){
			return $this->date;
		}
		function getText(){
			return $this->text;
		}
		
		
	}


?>