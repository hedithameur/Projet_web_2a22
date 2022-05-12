<?php
class commande
{
    protected $id;

    
    protected $id_user;

    
    protected $prix;

    protected $date;

    

    protected $mode_paiement;

    public function __construct($id, $id_user, $prix, $mode_paiement)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->prix = $prix;
        $this->mode_paiement = $mode_paiement;
    }

    

    /**
     * Get the value of mode_paiement
     */ 
    public function getMode_paiement()
    {
        return $this->mode_paiement;
    }

    /**
     * Set the value of mode_paiement
     *
     * @return  self
     */ 
    public function setMode_paiement($mode_paiement)
    {
        $this->mode_paiement = $mode_paiement;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of id_panier
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_panier
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}

?>