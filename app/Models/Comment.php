<?php

namespace App\Models;

use App\Models\admin\Admin;

/**
 * Class Comment
 * @package App\Models
 */
class Comment extends AppModel
{
    /**
     * @param $author
     * @param $comment
     * @param $articleid
     * @return false
     */
    public function addCommentInDataBase($author, $comment, $articleid)
    {
        $author = $this->checkAuthorOnCorrect($author);
        $comment =  $this->checkCommentOnCorrect($comment);
        $articleid =  $this->checkActicleOnCorrect($articleid);
        if($author == false|| $comment  == false || $articleid  == false) {
            return false;
        }

        (Admin::isAdmin()) ? $status=1 : $status=0;

        \R::exec( 'INSERT INTO comments(articleid, author, message, status)  
                       VALUES (:articleid, 
                               :author, 
                               :message,
                               :status)', [
                           'articleid' => $articleid,
                           'author' => $author,
                           'message' => $comment,
                           'status' => $status] );
    }

    /**
     * @param $author
     * @return false|string
     */
    public function checkAuthorOnCorrect($author)
    {
        if(empty($author)) {
            return false;
        }
        $correctAuthorName = mb_strimwidth($author, 0, 50);
        $correctAuthorName = strip_tags($correctAuthorName);
        return $correctAuthorName;
    }

    /**
     * @param $comment
     * @return false|string
     */
    public function checkCommentOnCorrect($comment)
    {
        if(empty($comment)) {
            return false;
        }
        return htmlentities($comment);
    }

    /**
     * @param $articleid
     * @return false|int|string
     */
    public function checkActicleOnCorrect($articleid)
    {
        if(empty($articleid) || !is_numeric($articleid)) {
            return false;
        }
        if(\R::count('articles', 'id=' . $articleid) < 1) {
            header("Location: /");
            die;
        }
        return $articleid;
    }

    /**
     * @param $commentID
     * @return bool
     */
    public function isCommentInDatabase($commentID)
    {
        $correctID = intval((int)$commentID);
        if(!empty($commentID)){
            if(\R::count('comments', 'WHERE id = '. $correctID) > 0) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * @param $commentID
     */
    public function deleteComment($commentID)
    {
        \R::exec('DELETE FROM comments WHERE id = ' . $commentID);
    }

    /**
     * @return array|null
     */
    public function getAllInactiveComments()
    {
        return \R::getAll("SELECT id, articleid, author, message FROM comments WHERE status = 0");
    }

    /**
     * @param $articleID
     * @return mixed
     */
    static function getArticleWithInactiveComment($articleID)
    {
        $article = \R::findOne("articles"," WHERE id=" . $articleID );
        return $article['title'];
    }

    /**
     * @param $commentID
     */
    public function approveComment($commentID)
    {
        if(\R::count('comments', "WHERE id = ? ", [$commentID]) > 0) {
            \R::exec("UPDATE comments SET status=1 WHERE id = ? ", [$commentID]);
        }
    }
}