<?php

namespace App\models\admin;

use App\Models\AppModel;

/**
 * Class Article
 * @package App\models\admin
 */
class Article
{
    /**
     * @param $article
     * @return mixed
     */
    public function addArticleInDatabase($article)
    {

        (isset($article['active'])) ? $active = 1 : $active = 0;

        \R::exec( "INSERT INTO articles (title, author, datepublished, description, content, active)
                       VALUES (?, ?, CURRENT_TIMESTAMP(), ?, ?, ?)", [
                           $article['title'],
                           $article['author'],
                           $article['description'],
                           $article['content'],
                           $active]);

        return \R::getInsertID();
    }

    /**
     * @param $file
     * @param $articleID
     * @return bool
     */
    public function uploadIMG($file, $articleID)
    {
        if(empty($file) ||  $file['error'] != 0 || $file['size'] > 32457280) {
            return false;
        }

        $type = $this->defineTypeImg($file['type']);
        if($type){

            $uploadfile = WWW . UPLOAD_DIR . basename($file["name"]);
            $filename   = md5(date("Y-m-d H:i:s") . rand()) . "." . $type;
            $filepath   = WWW . UPLOAD_DIR . $filename;

            if (move_uploaded_file($file["tmp_name"], $uploadfile)) {
                rename($uploadfile, $filepath);
            } else {
                return false;
            }
        }else{
            return false;
        }

        \R::exec("UPDATE articles SET img=? WHERE id=? ", [$filename, $articleID]);
        return true;
    }

    /**
     * @param $type
     * @return false|mixed|string
     */
    public function defineTypeImg($type)
    {
        $datatype = explode('/',$type);
        if($datatype[0] == "image"){
            return $datatype[1];
        }
        return false;
    }

    /**
     * @param $articleID
     */
    public function deleteArticleFromDataBase($articleID)
    {
        $urlpathobject = \R::getAll('SELECT img FROM articles WHERE id = '  . $articleID);
        foreach($urlpathobject as $item){
            $urlpath = $item['img'];
        }
        $urlpath = substr(UPLOAD_DIR . basename($urlpath), 1);
        if(file_exists("$urlpath")){
            unlink("$urlpath");
        }

        \R::exec("DELETE FROM articles WHERE id =" . $articleID);

        $caregoriesID = \R::findAll('articlecategory', 'WHERE articleid = ' . $articleID);
        foreach ($caregoriesID as $category) {
            $this->decreaseCountCategory($category['categoryid']);
        }

        \R::exec('DELETE FROM articlecategory WHERE articleid = '. $articleID);
        \R::exec("DELETE FROM comments WHERE articleid = " . $articleID);
    }


    /**
     * @param $article
     * @param $articleID
     */
    public function updateArticleInDatabase($article, $articleID)
    {
        (isset($article['active'])) ? $active = 1 : $active = 0;
        \R::exec("UPDATE articles SET title=?,author=?,datalastedit=CURRENT_TIMESTAMP(),description=?,content=?,active=? WHERE id=? ", [
                                        $article['title'],
                                        $article['author'],
                                        $article['description'],
                                        $article['content'],
                                        $active,
                                        $articleID ]);
    }

    /**
     * @param $article
     * @param $articleID
     * @return false
     */
    public function createLinkArticleWithCategory($categories, $articleID)
    {
        if(empty($categories)) {
            return false;
        }
        foreach ($categories as $categoryID) {
            \R::exec( "INSERT INTO articlecategory (articleid, categoryid)
                            VALUES (?, ?)", [
                $articleID,
                $categoryID]);
        }
    }

    /**
     * @param string $categories
     * @param $articleID
     */
    public function updateLinkArticleWithCategory($categories = '', $articleID)
    {
        if(empty($categories)) {
            $categoriesDecreaseCount = \R::findAll('articlecategory', 'WHERE articleid =' . $articleID);
            foreach($categoriesDecreaseCount as $item){
                $this->decreaseCountCategory($item['categoryid']);
            }

            \R::exec("DELETE FROM articlecategory WHERE articleid =" . $articleID);

        }else{

            $linksArticleWithCategories = \R::getAll('SELECT categoryid FROM  articlecategory WHERE articleid = ' . $articleID);
            foreach ($linksArticleWithCategories as $item) {
                $previousID[] = $item['categoryid'];
            }

            if(empty($previousID)) {
                $previousID[] = '';
            }

            $add[]    = array_diff($categories, $previousID);
            $remove[] = array_diff($previousID, $categories);

            foreach ($add[0] as $item) {
                \R::exec("INSERT INTO articlecategory(articleid, categoryid) VALUES(?, ?)", [$articleID, $item]);
                $this->increaseCountCategory($item);
            }

            foreach ($remove[0] as $item) {
                \R::exec("DELETE FROM articlecategory WHERE articleid = ? AND categoryid = ?", [$articleID, $item]);
                $this->decreaseCountCategory($item);
            }
        }
    }

    /**
     * @param $categoryID
     */
    public function increaseCountCategory($categoryID)
    {
        \R::exec( "UPDATE categories SET countarticleid=countarticleid+1 WHERE id = ? ", [$categoryID] );
    }

    /**
     * @param $categoryID
     */
    public function decreaseCountCategory($categoryID)
    {
        \R::exec( "UPDATE categories SET countarticleid=countarticleid-1 WHERE id = ? ", [$categoryID] );
    }

    /**
     * @param $article
     * @return false
     */
    public function updateCountCategoryWhenAddArticle($article)
    {
        if(empty($article['categories'])) {
            return false;
        }

        foreach ($article['categories'] as $categoryID) {
            $this->increaseCountCategory($categoryID);
        }
    }

    /**
     * @return array
     */
    public function getListCategories()
    {
        return \R::findAll('categories');
    }

    /**
     * @param $article
     * @return bool
     */
    public function verifyDataForDatabase($article)
    {
        foreach ($article as $key => $value)
        {
            switch ($key){
                case 'title':
                case 'author':
                case 'img':
                case 'description':
                    $article[$key] = strip_tags($value);
                    break;
            }

            if(empty($value))
                return false;
        }

        if(empty($article['categories'])) {
            $_POST['categories'] = '';
        }
        return true;
    }

    /**
     * @param $articleID
     * @return bool
     */
    public function isArticleInDatabase($articleID)
    {
        if(isINT($articleID)) {
            if((\R::count('articles', 'WHERE id=' . $articleID)) == 1){
                return true;
            }
        }
        return false;
    }
}