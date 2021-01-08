<?php

namespace Blog\Base;

/**
 * Class Controller
 * @package Blog\Base
 */
abstract class Controller
{
    /**
     * @var
     */
    public $route;
    /**
     * @var mixed
     */
    public $controller;
    /**
     * @var mixed
     */
    public $view;
    /**
     * @var mixed
     */
    public $prefix;
    /**
     * @var
     */
    public $layout;
    /**
     * @var array
     */
    public $data = [];
    /**
     * @var string[]
     */
    public $meta = ['title' => '', 'description' => '', 'keywords' => ''];

    /**
     * Controller constructor.
     * @param $route - Full page URL
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    /**
     * @throws \Exception
     */
    public function getView()
    {
        $viewvObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewvObject->render($this->data);
    }

    /**
     * @param $data
     */
    public function set($data)
    {
        $this->data = $data;
    }

    /**
     * @param string $title
     * @param string $desctiption
     * @param string $keywords
     */
    public function setMeta($title = '', $desctiption = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $desctiption;
        $this->meta['keywords'] = $keywords;
    }
}