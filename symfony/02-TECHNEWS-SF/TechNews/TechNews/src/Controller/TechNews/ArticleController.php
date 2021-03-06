<?php

namespace App\Controller\TechNews;

use App\Entity\Article;
use App\Entity\Auteur;
use App\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends Controller
{
    /**
     * Demonstration, Ajouter un article avec Doctrine
     * @Route("/article", name="article")
     */
    public function index()
    {
        #Création de la categorie
        $categorie = new Categorie();
        $categorie->setLibelle('Business');

        #Création de auteur
        $auteur = new Auteur();
        $auteur->setPrenom('Emilie');
        $auteur->setNom('Follin');
        $auteur->setEmail('emiliefollin@gmail.com');
        $auteur->setPassword('test');

        #Création de notre article
        $article = new Article();
        $article->setTitre('Ceci est un titre');
        $article->setContenu('ceci est un contenu');
        $article->setFeaturedimage('3.jpg');
        $article->setSpecial(0);
        $article->setSpotlight(1);

        #Associe une categorie et un auteur a notre article
        $article->setCategorie($categorie);
        $article->setAuteur($auteur);

        #On sauvegarde le tout en BDD
        #em : Entity Manager
        $em = $this->getDoctrine()->getManager();
        $em->persist($categorie);
        $em->persist($article);
        $em->persist($auteur);
        $em->flush();
        #Flush : sauvegarde




        #Retour de la vue
        return new Response('Nouvel article ajouté avec ID : ' .
            $article->getId() . ' et la nouvelle catégorie : ' .
            $categorie->getLibelle() . ' de Auteur : ' .
            $auteur->getPrenom() );


    }

    /**
     * Formulaire pour ajouter un article
     * @Route("/creer-un-article", name="article_add")
     */
    public function addarticle() {

        # Récupération des Catégories
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findAll();

        # Création d'un nouvel article
        $article = new Article();

        # Récupération d'un Auteur de l'article
        $auteur = $this->getDoctrine()
            ->getRepository(Auteur::class)
            ->find(1);

        $article->setAuteur($auteur);

        # Créer le formuaire permettant l'ajout d'un article
        $form = $this->createFormBuilder($article)

            ->add('titre', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         => 'form-control',
                    'placeholder'   => 'Titre de l\'Article'
                ]
            ])

            ->add('categorie', EntityType::class, [
                'class'         => Categorie::class,
                'choice_label'  => 'libelle',
                'required'      => true,
                'expanded'      => false,
                'multiple'      => false,
                'attr'          => [
                    'class' => 'form-control'
                ]
            ])

            ->add('contenu', TextareaType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control'
                ]
            ])

            ->add('featuredimage', FileType::class, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'class' => 'dropify'
                ]
            ])

            ->add('special', CheckboxType::class, [
                'required'  => false,
                'label'     => false,
            ])

            ->add('spotlight', CheckboxType::class, [
                'required'  => false,
                'label'     => false,
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Publier',
                'attr'      => [
                    'class' => 'btn btn-primary'
                ]
            ])

            ->getForm();

        # Affichage du Formulaire dans la Vue
        return $this->render('article/ajouterarticle.html.twig', [
            'form' => $form->createView()
        ]);

    }

}