<?php

namespace App\Models;

/**
 * Class Review
 * @package App\Models
 */
class Review extends AppModel
{
    /**
     * @param $articleID
     * @return mixed
     */
    public function vefiryArticleID($articleID)
    {
        if(empty($articleID) || !is_numeric((int)$articleID)) {
            header("Location: /");
        }
        return $articleID;
    }

    /**
     * @param $articleID
     * @return \RedBeanPHP\OODBBean|NULL
     * @throws \Exception
     */
    public function getArticle($articleID)
    {
        $article = \R::findOne('articles', 'WHERE id=' . $articleID);
        if(empty($article)){
            throw new \Exception('Database haven`t article with this ID');
        }
        return $article;
    }

    /**
     * @param $articleID
     * @return array
     */
    public function getComments($articleID)
    {
        return \R::findAll('comments', 'WHERE articleid='. $articleID . ' AND status=1');
    }
}