<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23/02/2018
 * Time: 09:58
 */


#principe d'une classe : regrouper de maniere cohérente les données
class Eleve
{
    #propriété
    public $_nom = "FOLLIN",
           $_prenom = "Emilie";
    #proteger : visible a l'interieur de la classe mais erreur d'affichage
    #private =  seulement a l'interieur de la classe
    #proteged = seulemtn a l'interieur de la classe et ceux qui hérite
    #public = accessible depuis l'exterieur
    protected $email = "emiliefollin@gmail.com";

    #methode
    public function getNomComplet(){
        echo $this->_prenom. ' '. $this->_nom;
    }

}

$mon_eleve = new Eleve();
echo $mon_eleve->_prenom. '<br>';
$mon_eleve->getNomComplet(). '<br>';
