<?php

#Importation de notre Classe Ecole

require_once 'Ecole.class.php';


/**
 * Création d'une instense de la classe Ecole.
 * Ici, notre variable $Ecole est un object de la classe Ecole.
 * En ce sens elle à accès, à l'ensemble des variables et fonctions qui la compose.
 */

$Ecole = new Ecole(
    'WF3 Rouen',
    'Place Saint Marc',
    'Alexandre MARTINI'
);

# Affichage de l'Object Ecole
var_dump($Ecole);

#Afficher le nom de l'école
# : cannot access private property
# echo $Ecole->NomEcole;

#Affichage du nom de l'Ecole
echo $Ecole->getNomEcole();

# Je veux changer le nom de l'école?
$Ecole->setNomEcole('WebForce3 ltd');

echo '<br>'.$Ecole->getNomEcole() .'<br>';




#Importation de notre classe Eleves

require_once 'Eleves.class.php';

# Création d'élèves

$Eleves1 = new Eleves('Follin', 'Emilie', 22);
$Eleves2 = new Eleves('Lemarie', 'Lou', 22);
$Eleves3 = new Eleves('Ballue', 'Jerome', 22);
$Eleves4 = new Eleves('Mokrani', 'Hedi', 22);




#Importation de notre classe Classes

require_once 'Classes.class.php';

$Classes1 = new Classes ('Front');
$Classes2 = new Classes ('Back');
$Classes3 = new Classes ('Fullstack');


# On va affecter nos éleves a leur classes
$Classes1->AjouterUnEleves($Eleves1);
$Classes1->AjouterUnEleves($Eleves2);
$Classes2->AjouterUnEleves($Eleves3);
$Classes3->AjouterUnEleves($Eleves4);

#Apercu d'une des classes
echo '<pre>';
    print_r ($Classes1);
echo '</pre>';

#Affecter les classes à une ecole
$Ecole->AjouterUneClasses($Classes1);
$Ecole->AjouterUneClasses($Classes2);
$Ecole->AjouterUneClasses($Classes3);

echo '<pre>';
print_r ($Ecole);
echo '</pre>';


# Afficher mes classes et leurs Eleves

echo '<ol>';

        #Parcourir les classes
        $lesClasses = $Ecole->getClasses();
        foreach ($lesClasses as $objClasse) {
            echo '<li>';
            echo $objClasse->getNomClasses();
            echo '<ul>';
                #On récupere les etudiants de la classe
            $lesEtudiants = $objClasse->getEleves();
            foreach ( $lesEtudiants as $objEtudiant){
                echo '<li>';
                echo $objEtudiant->getNomComplet();
                echo '</li>';
            }
            echo '</ul>';
            echo '</li>';
        }

        echo '</ol>';

        echo '<br>';
        echo '<br>';


