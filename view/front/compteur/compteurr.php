<?php
function ajouter_vue(){
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'compteur' .  DIRECTORY_SEPARATOR . 'compteur_vue';
    $fichier_jour = $fichier . '-' . date('y-m-d');    
  
    jour($fichier);
    jour($fichier_jour);

}

function jour(string $fichier):void{
    $compteur=1;
    if (file_exists($fichier)){
     $compteur = (int)file_get_contents($fichier);
     $compteur++;
     file_put_contents($fichier,$compteur);
    }else{
      file_put_contents($fichier, '1' );
    }

}

function nombre_vue(){
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'compteur' .  DIRECTORY_SEPARATOR . 'compteur_vue';
    return file_get_contents($fichier);
}
?>