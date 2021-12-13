<?php

namespace Blog;

/**
 * Trait TSingltone
 * @package Blog
 *
 *
 * @mixin App
 * @mixin Registry
 */
trait TSingltone
{
    /**
     * @var TSingltone
     */
    private static $instance;

    /**
     * @return TSingltone
     */
    public static function instance()
    {
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}