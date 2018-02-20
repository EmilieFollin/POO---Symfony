<?php
/**
 * Création d'une classe Ecole :
 * Une classe PHP est une entité regroupant des variables et des fonctions.
 * Chacune de ces fonctions aura accès aux variables de cette entité.
 */

class Classes
{
    # declaration des propriétés de notre class "Classes"

    private $NomClasses,
            $Eleves = [];

    # afin de pouvoir attribuer une valeur a mes différentes variables,
    # je vais mettre en un place un constructeur.

    /**
     * Classes constructor.
     * @param $NomClasses
     */


    public function __construct(
        $NomClasses)
    {
        #Ici nous allons attribuer une valeur aux propriété de la class.
        # La valeur est passé grâce au constructeur.

        $this->NomClasses         = $NomClasses;

    }

    /*------------------------------------------- GETTERS ---------------------------------*/

    /**
     * @return mixed
     */
    public function getNomClasses()
    {
        return $this->NomClasses;
    }

    /**
     * @return array
     */
    public function getEleves()
    {
        return $this->Eleves;
    }



    /*------------------------------------------- SETTERS ---------------------------------*/

    /**
     * @param mixed $NomClasses
     */
    public function setNomClasses($NomClasses)
    {
        $this->NomClasses = $NomClasses;
    }


    /**
     * @param Eleves $Eleves
     */
    public function AjouterUnEleves(Eleves $Eleves) {
        $this->Eleves[] = $Eleves;

    }




}



