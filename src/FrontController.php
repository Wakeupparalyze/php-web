<?php
declare(strict_types=1);


namespace App;

use  App\Helper as h;

class FrontController
{
    protected $model;
    protected $view;

    /**
     * FrontController constructor.
     * @param $model
     */
    public function __construct()
    {
        $this->model = new ArticleModel();
        $this->view = new FrontView();
    }

    public function goAbout()
    {
        $this->view->showAbout();
    }

    public function index()
    {
     $articles= $this->model->getArticles();
     $this->view->showBlogList($articles);

    }
    public function article( $id)
    {
     $article= $this->model->getArticleById((int)$id);
     $this->view->showSingleBlogList($article);
    }

    public function admin()
    {
        $this->view->showAdmin();
    }

    public function portfolio(){
        $this->view->showPortfolio();
    }
    public function adminpanel()
    {
        $this->view->showAdminPanel();
    }
    public function team()
    {
        $this->view->showTeam();
    }
}