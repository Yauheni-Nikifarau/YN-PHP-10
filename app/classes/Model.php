<?php
require ROOT . '/app/classes/DbConnection.php';

class Model
{
    protected $db;

    public function __construct () {
        $this->db = DbConnection::getInstance('articles');
    }
}