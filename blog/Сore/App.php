<?php

namespace Blog;

/**
 * Class App
 * @package Blog
 */
class App
{
    /**
     * @var TSingltone
     */
    public static $app;

    /**
     * App constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app =  Registry::instance();
        $this->getAllParams();
        new ErrorHandler();

        Db::instance();

        Router::dispatch($query);
    }

    public function getAllParams()
    {
        $params = require_once CONFIG . '/params.php';
        if(!empty($params)){
            foreach($params as $key => $value){
                self::$app->setProperty($key, $value);
            }
        }
    }
}