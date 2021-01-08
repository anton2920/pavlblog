<?php

namespace App\Controllers\admin;

use App\models\admin\Article;
use App\Models\Comment;
use App\Models\Review;

/**
 * Class ArticleController
 * @package App\Controllers\admin
 */
class ArticleController extends AdminController
{
    public function addpageAction()
    {
        $this->setMeta('Add article', 'description', 'keywords');
        $categories = $this->getAllCategories();
        $_SESSION['token'] = $_SESSION['user'] . rand();
        $this->set(compact('categories'));
    }

    /**
     * @throws \Exception
     */
    public function editpageAction()
    {
        $articleObject       = new Review();
        $articleID           = $articleObject->vefiryArticleID($_GET['id']);
        $categories          = $this->getAllCategories();
        $categoriesOfArticle = $this->getCategoriesOfArticle($articleID);
        $article             = $articleObject->getArticle($articleID);
        $_SESSION['token'] = $_SESSION['user'] . rand();
        $this->set(compact('categories', 'article', 'categoriesOfArticle'));
        $this->setMeta('Edit article', 'description', 'keywords');
    }

    public function addAction()
    {
        $articleObject = new Article();
        if($this->compareToken($_POST['token']) && $articleObject->verifyDataForDatabase($_POST)){
            $articleID = $articleObject->addArticleInDatabase($_POST);
            $ingfile = $this->getImgFile('img');
            $articleObject->uploadIMG($ingfile, $articleID);
            $articleObject->updateCountCategoryWhenAddArticle($_POST);
            $articleObject->createLinkArticleWithCategory($_POST['categories'], $articleID);
        }
        header("Location: /");
        exit();
    }

    public function editAction()
    {
        $articleObject = new Article();
        if(isINT($_GET['id']) && $articleObject->verifyDataForDatabase($_POST) && $this->compareToken($_POST['token'])) {
            $articleID = $_GET['id'];
            $categoriesList = $_POST['categories'] ?? '';
            $ingfile = $this->getImgFile('img');
            if($ingfile != false) {
                $articleObject->uploadIMG($ingfile, $articleID);
            }
            $articleObject->updateArticleInDatabase($_POST, $articleID);
            $articleObject->updateLinkArticleWithCategory($categoriesList, $articleID);
            header("Location: /article/review/?article=" . $articleID);
            exit();
        }
        header("Location: /");
        exit();
    }

    public function deleteAction()
    {
        $articleObject = new Article();
        if($articleObject->isArticleInDatabase($_GET['id'])){
            $articleObject->deleteArticleFromDataBase($_GET['id']);
        }
        header("Location: /");
        exit();
    }

    public function deletecommentAction()
    {
        $commentObject = new Comment();
        $commentID = $_GET['id'];
        if($commentObject->isCommentInDatabase($commentID)){
            $commentObject->deleteComment($commentID);
        }

        if(isset($_GET['article'])){
            header("Location: /admin/article/confirmcomments");
        }else{
            header("Location: /admin/article/confirmcomments");
        }
        exit();
    }

    public function confirmcommentsAction()
    {
        $commentObject       = new Comment();
        $allInactiveComments = $commentObject->getAllInactiveComments();
        $this->set(compact('allInactiveComments'));
    }

}
