<?PHP 
class produit{
	private $id;
	private $marque;
	private $modele;
  private $image;
  private $prix;
  private $id_c;
  protected $primarykey= 'id' ;


    function __construct($id,$marque,$modele,$image,$prix,$id_c)
    {
		$this->id=$id;
		$this->marque=$marque;
		$this->modele=$modele;
   $this->image=$image;
    $this->prix=$prix;
    $this->id_c=$id_c;

		

	}
     
    //////////////////////////////////////////////////////////////

    function getid()
    {
		return $this->id;
    }
    
    function getmarque()
    {
		return $this->marque;
    }

    function getmodele()
    {
		return $this->modele;
    }
  function getimage()
    {
		return $this->image;
    }
	
    function getprix()
    {
		return $this->prix;
    }
    function getid_c()
    {
		return $this->id_c;
    }
    
    
    
    //////////////////////////////////////////////////////////////
    
    function setid($id)
    {
		$this->id=$id;
    }

    function setmarque($marque)
    {
		$this->marque=$marque;
    }

    function setmodele($modele)
    {
		$this->modele=$modele;
    }
 
   function setimage($image)
    {
		$this->image=$image;
    }
	
    function setprix($prix)
    {
		$this->prix=$prix;
    }
    function setid_c($id_c)
    {
		$this->id_c=$id_c;
    }


  }
?>