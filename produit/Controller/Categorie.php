<?PHP 
class categorie{
	private $idC;
	private $nomC;



    function __construct($idC,$nomC)
    {
		$this->idC=$idC;
		$this->nomC=$nomC;

		

	}
     
    //////////////////////////////////////////////////////////////

    function getidC()
    {
		return $this->idC;
    }
    
    function getnomC()
    {
		return $this->nomC;
    }

    
    //////////////////////////////////////////////////////////////
    
    function setidC($idC)
    {
		$this->idC=$idC;
    }

    function setnomC($nomC)
    {
		$this->nomC=$nomC;
    }

  }
?>