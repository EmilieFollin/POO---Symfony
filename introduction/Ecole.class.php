<?php
/**
 * Création d'une classe Ecole :
 * Une classe PHP est une entité regroupant des variables et des fonctions.
 * Chacune de ces fonctions aura accès aux variables de cette entité.
 */

class Ecole
{
    # declaration des propriétés de notre class "Ecole"

    private $NomEcole,
            $AdressEcole,
            $DirecteurEcole,
            $Classes = [];

    # afin de pouvoir attribuer une valeur a mes différentes variables,
    # je vais mettre en un place un constructeur.

    /**
     * Ecole constructor.
     * @param $NomEcole
     * @param $AdresseEcole
     * @param $DirecteurEcole
     */

    public function __construct(
        $NomEcole,
        $AdresseEcole,
        $DirecteurEcole)
    {
        #Ici nous allons attribuer une valeur aux propriété de la class.
        # La valeur est passé grâce au constructeur.

        $this->NomEcole         = $NomEcole;
        $this->AdressEcole      = $AdresseEcole;
        $this->DirecteurEcole   = $DirecteurEcole;
    }

    /*------------------------------------------- GETTERS ---------------------------------*/

    /**
     * @return mixed
     */
    public function getDirecteurEcole()
    {
        return $this->DirecteurEcole;
    }

    /**
     * @return mixed
     */
    public function getNomEcole()
    {
        return $this->NomEcole;
    }


    /**
     * @param mixed $AdressEcole
     */
    public function getAdressEcole()
    {
        $this->AdressEcole = $AdressEcole;
    }

    public function getClasses() {
        return $this->Classes;

    }

    /*------------------------------------------- SETTERS ---------------------------------*/

    /**
     * affecter une nouvelle valeur à NomEcole
     * @param mixed $NomEcole
     */
    public function setNomEcole($NomEcole)
    {
        $this->NomEcole = $NomEcole;
    }

    /**
     * @param mixed $AdresseEcole
     */
    public function setAdresseEcole($AdresseEcole)
    {
        $this->AdresseEcole = $AdresseEcole;
    }

    /**
     * @param mixed $DirecteurEcole
     */
    public function setDirecteurEcole($DirecteurEcole)
    {
        $this->DirecteurEcole = $DirecteurEcole;
    }


    /**
     * @return array
     */
    public function AjouterUneClasses(Classes $Classes)
    {
         $this->Classes[] = $Classes;
    }
}




