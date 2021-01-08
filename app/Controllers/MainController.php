<?php

namespace App\Controllers;

use App\Models\admin\Admin;
use App\models\Article;
use Blog\App;
use Blog\Pagination;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController extends AppController
{
    public function indexAction()
    {
        $articleObject   = new Article();
        $safeCondition = $_GET['condition'] ?? '';
        $searchCondition = $articleObject->prepareSearchCondition($safeCondition);
        (Admin::isAdmin()) ? $userCondition = ' (active = 1 or active = 0) ' : $userCondition = ' active = 1 ';

        $page    = $this->getPageNumber();
        $perpage = App::$app->getProperty('pagination');
        $total   = $articleObject->getTotalCount($userCondition, $searchCondition);

        $pagination = new Pagination($page, $perpage, $total);
        $start      = $pagination->getStart();

        $articles   = $articleObject->receiveListArticle($start, $perpage, $userCondition, $searchCondition);
        $categories = $articleObject->getExistCategories();

        $this->set(compact('articles', 'pagination', 'categories', 'searchCondition'));
        $this->setMeta(App::$app->getProperty('blog_name'), 'description', 'keywords');
    }
}