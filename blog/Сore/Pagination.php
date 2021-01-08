<?php

namespace Blog;
/**
 * Class Pagination
 * @package Blog
 */
class Pagination
{
    /**
     * @var false|float|int
     */
    public $currentpage;
    /**
     * @var
     */
    public $perpage;
    /**
     * @var
     */
    public $total;
    /**
     * @var false|float|int
     */
    public $countpages;
    /**
     * @var string
     */
    public $uri;


    /**
     * Pagination constructor.
     * @param $page
     * @param $perpage
     * @param $total
     */
    public function __construct($page, $perpage, $total)
    {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countpages = $this->getCountPages();
        $this->currentpage = $this->getCurrentPage($page);

        $this->uri = $this->getParams();

    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $back       = null;
        $forward    = null;
        $startpage  = null;
        $endpage    = null;
        $result     = null;

        include ROOT . "/views/components/breadcrumps.php";

        return $result;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getHtml();
    }

    /**
     * @return false|float|int
     */
    public function getCountPages()
    {
        return ceil($this->total / $this->perpage) ?? 1;
    }

    /**
     * @param $page
     * @return false|float|int
     */
    public function getCurrentPage($page)
    {
        if(empty($page) || $page <= 1) {
            $page = 1;
        } else if($page > $this->countpages) {
            $page = $this->countpages;
        }
        return $page;
    }

    /**
     * @return float|int
     */
    public function getStart()
    {
        return ($this->currentpage-1) * $this->perpage;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if(isset($url[1]) && $url[1] != ''){
            $params = explode('&', $url[1]);
            foreach($params as $param){
                if(!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }
        return urldecode($uri);
    }
}