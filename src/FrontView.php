<?php
declare(strict_types=1);

namespace App;


class FrontView
{
 public $twig;
 public $loader;


    public function __construct()
    {

        $this->loader = new \Twig\Loader\FilesystemLoader('frontend/');
        $this->twig = new \Twig\Environment($this->loader, [
//            'cache' => '/path/to/compilation_cache',
        ]);
    }

    public function showBlogList($articles)
    {
        echo $this->twig->render('blog-list.twig',['articles'=>$articles]);
    }

    public function showAbout()
    {
        echo $this->twig->render('about.twig');
    }

    public function showSingleBlogList($article)
    {
        echo $this->twig->render('blog-single.twig', ['article' => $article]);
    }

    public function showAdmin()
    {
        echo $this->twig->render('admin.twig');
    }
    public function showPortfolio()
    {
        echo $this->twig->render('portfolio.twig');
    }
    public function showAdminPanel()
    {
        echo $this->twig->render('adminpanel.twig');
    }
    public function showTeam()
    {
        echo $this->twig->render('team.twig');
    }
}