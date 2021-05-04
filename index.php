<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require ROOT . '/app/classes/mainController.php';
$controller = new mainController();
$controller->index();

