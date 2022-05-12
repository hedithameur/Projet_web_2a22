<?PHP 
class produit{
	private $matricule;
	private $marque;
	private $modele;
  private $prix_pr;
  private $categorie;
  protected $primarykey= 'matricule' ;


    function __construct($matricule,$marque,$modele,$prix_pr,$categorie)
    {
		$this->matricule=$matricule;
		$this->marque=$marque;
		$this->modele=$modele;
    $this->prix_pr=$prix_pr;
    $this->categorie=$categorie;

		

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
/*    function getimage()
    {
		return $this->image;
    }
*/	
    function getprix_pr()
    {
		return $this->prix_pr;
    }
    function getcategorie()
    {
		return $this->categorie;
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
/*    
    function setimage($image)
    {
		$this->image=$image;
    }
*/	
    function setprix_pr($prix_pr)
    {
		$this->prix_pr=$prix_pr;
    }
    function setcategorie($categorie)
    {
		$this->categorie=$categorie;
    }


  }
?>