<?php

namespace App\Models;

use App\Models\admin\Admin;

/**
 * Class Categories
 * @package App\Models
 */
class Categories extends AppModel
{
    /**
     * @param $categoryID
     * @return mixed
     * @throws \Exception
     */
    public function getCategory($categoryID)
    {
        foreach ((\R::find('categories', 'id=' . $categoryID)) as $item){
            $category['total'] = $item['countarticleid'];
            $category['name'] = $item['name'];
        }
        
        if(empty($category)) {
            throw new \Exception('Database haven`t category with this ID');
        }
        return $category;
    }

    /**
     * @param $categoryID
     * @param $start
     * @param $perpage
     * @return array
     * @throws \Exception
     */
    public function getAllArticlesPerCategory($categoryID, $start , $perpage)
    {
        (Admin::isAdmin()) ? $condition = ' (active = 1 or active = 0) ' : $condition = ' active = 1 ';
        $articles = \R::findAll('articles',
                 'INNER JOIN articlecategory 
                       ON articles.id = articlecategory.articleid 
                       WHERE articlecategory.categoryid = '. $categoryID . " and ". $condition.
                      "ORDER BY datepublished DESC, id DESC".
                      ' LIMIT ' . $start . ', ' . $perpage);
        if(empty($articles)) {
            throw new \Exception('Database haven`t articles with this category');
        }
        return $articles;
    }

    /**
     * @param $categoryID
     * @return mixed
     * @throws \Exception
     */
    public function getDataAboutCategory($categoryID)
    {
        $categoryinfo = \R::findOne('categories', 'WHERE id='.$categoryID);

        $category['name']  =  $categoryinfo->name;
        $category['count'] =  $categoryinfo->countarticleid;

        return $category;
    }
}