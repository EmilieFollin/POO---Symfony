<?php
namespace App\Controller\TechNews;
use App\Entity\Article;
use App\Service\Article\ArticleProvider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends Controller
{
    /**
     * Page d'accueil de notre site.
     * Configuration de notre route dans routes.yaml
     * @param ArticleProvider $articleProvider
     * @return Response
     */
    public function index(ArticleProvider $articleProvider) {
        # return new Response("<html><body><h1>Page d'Accueil</h1></body></html>");
        $articles = $articleProvider->getArticles();

        # Transmission à la vue
        return $this->render('index/index.html.twig', [
            'articles' => $articles
        ]);
    }
    /**
     * Page permettant d'afficher les articles d'une catégorie
     * @Route("/categorie/{libellecategorie}",
     *     name="index_categorie",
     *     requirements={"libellecategorie" = "\w+"},
     *     methods={"GET"})
     * @param string $libellecategorie
     * @return Response
     */
    public function categorie($libellecategorie = 'tout') {
        return new Response("<html><body><h1>Page Catégorie : $libellecategorie</h1></body></html>");
    }
    /**
     * Page permettant d'afficher un Article
     * @Route("/{libellecategorie}/{slugarticle}_{id}.html",
     *     name="index_article",
     *     requirements={"id" = "\d+"})
     */
    public function article(Article $article) {
        # index.php/business/une-formation-symfony-a-paris_98426852.html

        # Récupération avec Doctrine
        #$article = $this->getDoctrine()
         #   ->getRepository(Article::class)
          #  ->find($idarticle);

        # Si aucun article n'est trouvé...
        if(!$article) :

            # On génère une exception
            #throw $this->createNotFoundException(
            #    "Nous n'avons pas trouvé votre article ID : $idarticle"
            #);

            # Ou on peut aussi rediriger l'utilisateur sur la page index
            return $this->redirectToRoute('index',[],Response::HTTP_MOVED_PERMANENTLY);

        endif;

        return $this->render('index/article.html.twig', [
            'article' => $article
        ]);
    }
}