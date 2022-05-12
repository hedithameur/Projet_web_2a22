<?php
	class admin{
		private $id_admin=null;

		private $pasword=null;
		private $email=null;
		private $date=null;
		//private $date;
		
		
		function __construct($id_admin, , $pasword, $email, $date/*, $date*/){
			$this->id_admin=$id_admin;
			
			$this->pasword=$pasword;
			$this->email=$email;
			$this->date=$date;
			//$this->date=$date;
		}
		function getid_admin(){
			return $this->id_admin;
	
		function getpasword(){
			return $this->pasword;
		}
		function getemail(){
			return $this->email;
		}
		function getcomments(){
			return $this->date;
		}
		/*function getdate(){
			return $this->date;
		}*/
	
		function setpasword(string $pasword){
			$this->pasword=$pasword;
		}
		function setemail(string $email){
			$this->email=$email;
		}
		function setcomments(string $comments){
			$this->date=$date;
		}
		/*function setdate(string $date){
			$this->date=$date;
		}*/
		
	}


?>