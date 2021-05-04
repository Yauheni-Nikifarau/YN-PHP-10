<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require ROOT . '/articles/ArticlesController.php';
$controller = new ArticlesController();
if (isset($_GET['post'])) {
    $controller->post($_GET['post']);
    die();
}
if (isset($_GET['category'])) {
    $page = $_GET['page'] ?? 1;
    $controller->category($_GET['category'], $page);
    die();
}
$controller->index();

