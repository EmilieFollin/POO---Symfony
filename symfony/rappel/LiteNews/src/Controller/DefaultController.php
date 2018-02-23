<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/categories")
     */
    public function categories() {
        return new Response('LES CATEGORIES');
    }

    /**
     * @Route("/categorie/{id}", name="default_categorie")
     */

    #nom du parametre dans la route est la meme dans la fonction
    public function categorie(Categorie $categorie){
        return $this->render('categorie.html.twig', [
           'categorie' => $categorie
        ]);
    }

    /**
     * @Route("/ajouter-une-categorie")
     */
    public function addcategorie(Request $request) {
        #creation d'une nouvelle categorie
        $categorie = new Categorie();

        #creation dun formulaire pour creer une categorie
        $form = $this->createFormBuilder($categorie)
            ->add('libelle', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm();


        #print_r ($_POST)

        #Recuperation des données
        $form->handleRequest($request);

        #verification des données du formualaires
        if($form->isSubmitted() && $form->isValid()) :
            $categorie= $form->getData();

            #sauvegarder en base de donnée
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            #redirection
             return $this->redirectToRoute('default_categorie', [
                'id'=>$categorie->getId()
            ]);

        endif;

        #affichage du formulaire
        return $this->render('addcategorie.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
