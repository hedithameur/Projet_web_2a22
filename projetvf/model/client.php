<?php
	class client{
		private $idclient=null;
		private $nom=null;
		private $prenom=null;
		private $password=null;
		private $email=null;
		private $telephone;
		
		private $password=null;
		function __construct($idclient, $nom, $prenom, $password, $email, $telephone){
			$this->idclient=$idclient;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->password=$password;
			$this->email=$email;
			$this->telephone=$telephone;
		}
		function getIdclient(){
			return $this->idclient;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getpassword(){
			return $this->password;
		}
		function getEmail(){
			return $this->email;
		}
		function gettelephone(){
			return $this->telephone;
		}


		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setpasword(string $pasword){
			$this->pasword=$pasword;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function settelephone(string $telephone){
			$this->telephone=$telephone;
		}
		
	}


?>