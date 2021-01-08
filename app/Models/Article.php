<?php

namespace App\models;

/**
 * Class Article
 * @package App\models
 */
class Article extends AppModel
{
    /**
     * @param $start
     * @param $perpage
     * @param $userCondition
     * @param $searchCondition
     * @return array
     */
    public function  receiveListArticle($start, $perpage, $userCondition, $searchCondition)
    {
        return \R::findAll('articles', " WHERE " . $userCondition . $searchCondition . "ORDER BY datepublished DESC, id DESC" . " LIMIT " . $start . ", " . $perpage );
    }

    /**
     * @param string $safeCondition
     * @return string
     */
    public function prepareSearchCondition($safeCondition = " ")
    {
        $safeCondition = htmlentities($safeCondition);
        if(empty($safeCondition) && empty($_GET['condition'])) {
            unset($_GET['condition']);
            return " ";
        }
        return " and title LIKE '%" . $safeCondition. "%' ";
    }

    /**
     * @param $userCondition
     * @param string $searchCondition
     * @return int
     */
    public function getTotalCount($userCondition, $searchCondition = " ")
    {
        return \R::count('articles', 'WHERE ' . $userCondition . $searchCondition);
    }
}