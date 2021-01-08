<?php

namespace App\Controllers\admin;

use App\Models\admin\Admin;
use Blog\Base\Controller;

/**
 * Class AdminController
 * @package App\Controllers\admin
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     * @param $route
     */
    public function __construct($route)
    {
        parent::__construct($route);
        if(!Admin::isAdmin() && $route['action'] != 'login' && $route['action'] != 'restore' && $route['action'] != 'newpass'){
           header("Location: /admin/main/login");
           exit();
        }
    }

    /**
     * @return int
     */
    protected function getPageNumber()
    {
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    /**
     * @param $name
     * @return false|mixed
     */
    protected function getImgFile($name)
    {
        return $_FILES[$name]['error'] == 0 ? $_FILES[$name] : false;
    }

    /**
     * @return array
     */
    protected  function getAllCategories()
    {
        return \R::findAll('categories');
    }

    /**
     * @param $articleID
     * @return false
     */
    protected  function getCategoriesOfArticle($articleID)
    {
        foreach (\R::getAll('SELECT categoryid FROM articlecategory WHERE articleid = ' . $articleID) as $item){
            $categories[] = $item['categoryid'];
        }

        if(empty($categories)) {
            return false;
        }
        return $categories;
    }

    /**
     * @param $token
     * @return bool
     */
    public function compareToken($token = "")
    {
        if(isset($_SESSION['token'])){
            if(password_verify($_SESSION['token'], $token)){
                unset($_SESSION['token']);
                return true;
            }
        }
        return false;
    }
}