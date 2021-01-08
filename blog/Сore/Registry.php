<?php

namespace Blog;

/**
 * Class Registry
 * @package Blog
 */
class Registry
{

    use TSingltone;

    /**
     * @var array
     */
    private static $properties = [];

    /**
     * @param $key
     * @param $value
     */
    public function setProperty($key, $value)
    {
        self::$properties[$key] = $value;
    }


    /**
     * @param $key
     * @return mixed|null
     */
    public function getProperty($key)
    {
        if(isset(self::$properties[$key])){
            return self::$properties[$key];
        }
        return null;
    }


    /**
     * @return array
     */
    public function getAllProperties()
    {
        return self::$properties;
    }
}