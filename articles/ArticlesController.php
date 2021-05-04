<?php
require ROOT . '/articles/ArticlesModel.php';
require ROOT . '/app/classes/View.php';

class ArticlesController
{
    protected $view, $model;

    public function __construct() {
        $this->view = new View ();
        $this->model = new ArticlesModel();
    }

    public function index () {
        $pageData = $this->model->getPageData();
        $this->view->generate(ROOT . '/articles/resources/views/main.php', $pageData);
    }

    public function category ($code, $page) {
        $pageData = $this->model->getCategoryPosts($code, $page);
        $this->view->generate(ROOT . '/articles/resources/views/section.php', $pageData);
    }

    public function post ($code) {
        $pageData = $this->model->getPostData($code);
        $this->view->generate(ROOT . '/articles/resources/views/detail.php', $pageData);
    }
}