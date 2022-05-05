<?PHP 
class avi{
	private $matricule;
	private $marque;
	private $modele;


    function __construct($matricule,$marque,$modele)
    {
		$this->matricule=$matricule;
		$this->marque=$marque;
		$this->modele=$modele;
  

		

	}
     
    //////////////////////////////////////////////////////////////

    function getmatricule()
    {
		return $this->matricule;
    }
    
    function getmarque()
    {
		return $this->marque;
    }

    function getmodele()
    {
		return $this->modele;
    }

 
    
    
    //////////////////////////////////////////////////////////////
    
    function setmatricule($matricule)
    {
		$this->matricule=$matricule;
    }

    function setmarque($marque)
    {
		$this->marque=$marque;
    }

    function setmodele($modele)
    {
		$this->modele=$modele;
    }


  }
?>