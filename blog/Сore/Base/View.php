<?php


namespace Blog\Base;


/**
 * Class View
 * @package Blog\Base
 */
class View
{

    public $route;
    public $controller;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    /**
     * View constructor.
     * @param $route - Full page URL
     * @param string $layout
     * @param string $view
     * @param $meta
     */
    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?? LAYOUT;
        }
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function render($data)
    {
        $viewFile = ROOT . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("View File not found", 500);
        }
        if(false !== $this->layout){
            if(isset($_SESSION['user']) && $_SESSION['role'] == 1) {
                $this->layout = ADMIN_LAYOUT;
            }

            $layoutFile = ROOT . "/views/layouts/{$this->layout}.php";
            if(is_file($layoutFile)){
                require_once $layoutFile;
            }else{
                throw new \Exception("Layout not found", 500);
            }
        }
    }

    /**
     * @return string
     */
    public function getMeta()
    {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['description'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }
}