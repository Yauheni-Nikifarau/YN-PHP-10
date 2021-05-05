<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require ROOT . '/config.php';
require ROOT . '/functions.php';
require ROOT . '/articles/ArticlesController.php';
$controller = new ArticlesController();
if (isset($_GET['post'])) {
    $post = $_GET['post'];
    $post = substr($post, strrpos($post, '_') + 1);
    $controller->post($post);
    die();
}
if (isset($_GET['category'])) {
    $page = $_GET['page'] ?? 1;
    $controller->category($_GET['category'], $page);
    die();
}
$controller->index();

