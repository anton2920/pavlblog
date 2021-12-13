<?php


namespace Blog\Base;

use Blog\Db;

/**
 * Class Model
 * @package Blog\Base
 */
abstract class Model
{
    /**
     * @var array
     */
    public $attributes = [];
    /**
     * @var array
     */
    public $errors = [];
    /**
     * @var array
     */
    public $rules = [];

    public function __construct()
    {

    }
}