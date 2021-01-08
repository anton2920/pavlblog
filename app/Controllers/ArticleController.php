<?php

namespace App\Controllers;

use App\Models\Categories;
use Blog\App;
use Blog\Pagination;
use App\Models\Comment;
use App\Models\Review;

/**
 * Class ArticleController
 * @package App\Controllers
 */
class ArticleController extends AppController
{
    /**
     * @throws \Exception
     */
    public function reviewAction()
    {
        $articleObject = new Review();
        $articleID     = $articleObject->vefiryArticleID($_GET['article']);
        $categories    = $articleObject->getExistCategories();
        $article       = $articleObject->getArticle($articleID);
        $comments      = $articleObject->getComments($articleID);
        $this->set(compact('categories', 'article', 'comments'));
        $this->setMeta(App::$app->getProperty('blog_name'), 'description', 'keywords');
    }

    public function addcommentAction()
    {
        $commentObject = new Comment();
        $commentObject->addCommentInDataBase($_POST['author'], $_POST['message'], $_GET['article']);
        header("Location: /article/review/?article=" . $_GET['article']);
        die;
    }

    /**
     * @throws \Exception
     */
    public function categoryAction()
    {
        $page             = $this->getPageNumber();
        $categoryID       = $_GET['category'];
        $categoriesObject = new Categories();
        if(isINT($page, 'categoryAction - page')){
            if(isINT($categoryID, 'categoryAction - categoryID')){
                $datacategory     = $categoriesObject->getDataAboutCategory($categoryID);
                $categories       = $categoriesObject->getExistCategories();

                $perpage    = App::$app->getProperty('pagination');
                $pagination = new Pagination($page, $perpage, $datacategory['count']);
                $start      = $pagination->getStart();
                $articles   = $categoriesObject->getAllArticlesPerCategory($categoryID, $start, $perpage);

                $this->set(compact('articles', 'pagination', 'categories', 'datacategory'));
                $this->setMeta('Category: ' . $datacategory['name'], 'description', 'keywords');
            }
        }
    }
}