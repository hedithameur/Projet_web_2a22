<?php
class panierLine
{
    protected $id;
    

    protected $id_panier;


    protected $quantite;


    protected $id_produit;

   
    protected $prix;

    public function __construct( $id_panier, $quantite, $id_produit, $prix)
    {
        $this->id_panier = $id_panier;
        $this->quantite = $quantite;
        $this->id_produit = $id_produit;
        $this->prix = $prix;
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
     * Get the value of id_panier
     */ 
    public function getId_panier()
    {
        return $this->id_panier;
    }

    /**
     * Set the value of id_panier
     *
     * @return  self
     */ 
    public function setId_panier($id_panier)
    {
        $this->id_panier = $id_panier;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of id_produit
     */ 
    public function getId_produit()
    {
        return $this->id_produit;
    }

    /**
     * Set the value of id_produit
     *
     * @return  self
     */ 
    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;

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
}

?>