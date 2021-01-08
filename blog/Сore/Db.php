<?php


namespace Blog;

/**
 * Class Db
 * @package Blog
 */
class Db
{
    use TSingltone;

    /**
     * Db constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        class_alias('\RedBeanPHP\R','\R');
        $db = require_once CONFIG . '/database.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if(!\R::testConnection()){
            throw new \Exception('Database: Connection failed');
        }
    }
}