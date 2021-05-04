<?php


class DbConnection
{
    private static $instances = [];

    protected function __construct() { }

    protected function __clone() { }

    protected function __wakeup() { }

    /**
     * @param $name Название базы данных
     * @return PDO
     */
    public static function getInstance($name) :PDO
    {
        if ( ! isset(self::$instances[$name])) {
            self::$instances[$name] = new PDO('mysql:host=localhost;dbname=' . $name, 'root', '');
        }

        return self::$instances[$name];
    }
}