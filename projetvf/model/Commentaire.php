<?php 

class Commentaire
{
	private $texte;
	private $dateCommentaire;
	

	
	public function getTexte(){return $this->texte;}
	public function getDateCommentaire(){return $this->dateCommentaire;}
	
	public function setTexte($texte){ $this->texte=$texte;}
	public function setDateCommentaire($dateCommentaire){ $this->dateCommentaire=$dateCommentaire;}
	
	
	public function __construct($texte,$dateCommentaire)
	{
		
		$this->texte=$texte;
		$this->dateCommentaire=$dateCommentaire;
		
	}
}


 ?>