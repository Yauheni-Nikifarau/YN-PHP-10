<?php
include_once ROOT . '/app/classes/View.php';
include_once ROOT . '/app/classes/MainModel.php';

class mainController
{
    protected $view, $model;

    public function __construct() {
        $this->view = new View ();
        $this->model = new MainModel();
    }

    public function index () {
        $pageData = $this->model->getPageData();
        $this->view->generate(ROOT . '/app/resources/views/main.php', $pageData);
    }
}