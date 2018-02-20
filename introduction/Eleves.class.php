<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/02/2018
 * Time: 11:29
 */

class Eleves
{

    private $NomEleves,
            $PrenomEleves,
            $AgeEleves;

    /**
     * Eleves constructor.
     * @param $NomEleves
     * @param $PrenomEleves
     * @param $AgeEleves
     */

    public function __construct(
        $NomEleves,
        $PrenomEleves,
        $AgeEleves)
    {
        #Ici nous allons attribuer une valeur aux propriété de la class.
        # La valeur est passé grâce au constructeur.

        $this->NomEleves       = $NomEleves;
        $this->PrenomEleves    = $PrenomEleves;
        $this->AgeEleves       = $AgeEleves;
    }

    /*------------------------------------------- GETTERS ---------------------------------*/

    /**
     * @return mixed
     */
    public function getNomEleves()
    {
        return $this->NomEleves;
    }

    /**
     * @return mixed
     */
    public function getPrenomEleves()
    {
        return $this->PrenomEleves;
    }

    /**
     * @return mixed
     */
    public function getAgeEleves()
    {
        return $this->AgeEleves;
    }


    /*------------------------------------------- SETTERS ---------------------------------*/

    /**
     * @param mixed $NomEleves
     */
    public function setNomEleves($NomEleves)
    {
        $this->NomEleves = $NomEleves;
    }

    /**
     * @param mixed $PrenomEleves
     */
    public function setPrenomEleves($PrenomEleves)
    {
        $this->PrenomEleves = $PrenomEleves;
    }

    /**
     * @param mixed $AgeEleves
     */
    public function setAgeEleves($AgeEleves)
    {
        $this->AgeEleves = $AgeEleves;
    }

    /**
     * Retourne le prenom + nom
     *
     * @return string Prenom + Nom
     */

    public function getNomComplet() {
        return $this->PrenomEleves. ' ' . $this->NomEleves;
    }


}