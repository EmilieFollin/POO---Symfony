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

}

$mon_eleve = new Eleve();
echo $mon_eleve->_prenom;
