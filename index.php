<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require ROOT . '/config.php';
require ROOT . '/functions.php';
require ROOT . '/app/classes/mainController.php';
$controller = new mainController();
$controller->index();

