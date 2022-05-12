<?php

class article
{
    private $titre;
    private $texte;
    private $auteur;
    private $source;
    private $urlImage;
    private $notifCreateur;
    private $Datearticle;


    public function getidNewsArticle()
    {
        return $this->idNewsArticle;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function getTexte()
    {
        return $this->texte;
    }
    public function getAuteur()
    {
        return $this->auteur;
    }
    public function getSource()
    {
        return $this->source;
    }
    public function getUrlImage()
    {
        return $this->urlImage;
    }
    public function getNotifCreateur()
    {
        return $this->notifCreateur;
    }
    public function getDatearticle()
    {
        return $this->Datearticle;
    }













    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }
    public function setSource($source)
    {
        $this->source = $source;
    }
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;
    }
    public function setNotifCreateur($notifCreateur)
    {
        $this->notifCreateur = $notifCreateur;
    }
    public function setDatearticle($Datearticle)
    {
        $this->Datearticle = $Datearticle;
    }






    public function __construct($titre, $texte, $auteur, $source, $urlImage, $notifCreateur, $Datearticle)
    {
        $this->titre = $titre;
        $this->texte = $texte;
        $this->auteur = $auteur;
        $this->source = $source;
        $this->urlImage = $urlImage;
        $this->notifCreateur = $notifCreateur;
        $this->Datearticle = $Datearticle;
    }
}
