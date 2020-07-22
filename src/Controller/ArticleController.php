<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var ArticleRepository
     */
    private $repository;

    public function __construct(EntityManagerInterface $manager,ArticleRepository $repository)
    {

        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [
            'articles' => $this->repository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="article-new")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function newArticle(Request $request,EntityManagerInterface $manager):Response
    {
        $article=new Article();
        $form=$this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($article);
            $manager->flush();
            return $this->redirectToRoute('article');
        }

        return $this->render("article/new.html.twig",[
            'article' => $article,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/edit/{id}", name="article-edit")
     * @param Article $article
     * @param Request $request
     */
    public function editArticle(Article $article,Request $request)
    {
        $form=$this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->manager->flush();
//            $this->addFlash('success','le bien et modifier avec succses');
            return $this->redirectToRoute('home');
        }

        return $this->render("article/edit.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/show/{id}", name="article.show")
     * @param Article $article
     */
    public function showArticle(Article $article)
    {
        $article=$this->repository->find($article);
        return $this->render("article/show.html.twig",[
            'article' => $article
            ]
        );
    }

    /**
     * @Route("/delete/{id}",name="article-delete")
     * @param Article $article
     * @param Request $request
     */
    public function deleteArticle(Article $article,Request $request)
    {
        $this->manager->remove($article);
        $this->manager->flush();
        return $this->redirectToRoute('article');
    }

}
