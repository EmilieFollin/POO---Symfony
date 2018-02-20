<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19/02/2018
 * Time: 10:16
 */

#Importation de l'autoload de Composer

use Symfony\Component\VarDumper\VarDumper;

require_once 'vendor/autoload.php';

#contenu de demonstration

class Contact {
    private $_firstname,
        $_lastname;

    /**
     * Contact constructor.
     * @param $_firstname
     * @param $_lastname
     */

    public function __construct($_firstname, $_lastname)
    {
        $this->_firstname = $_firstname;
        $this->_lastname  = $_lastname;
    }
}


$unString = 'Une chaine de caractère';
$unArray  = ['Hugo', 'Hocine', 'Benjamin'];
$unObject = new Contact('Hugo', 'LIEGARD');

#Test de VarDumper
VarDumper::dump($unString);
VarDumper::dump($unArray);
VarDumper::dump($unObject);
