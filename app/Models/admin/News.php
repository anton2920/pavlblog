<?php


namespace App\Models\admin;


use Blog\Base\Model;

class News extends  Model
{
    public function saveNews($news)
    {

        $checker = \R::findOne('articles', " WHERE link='" . $news['link'] . "'");

        if(isset($checker)){
            return -1;
        }

        \R::exec( "INSERT INTO articles (title, author, datepublished, img, description, content, active, link)
                       VALUES               (?,     ?,      ?,             ?,   ?,           ?,       ?,      ?)", [
            $news['title'],
            $news['author'],
            $news['date'],
            $news['img'],
            $news['description'],
            $news['content'],
            1,
            $news['link']
        ]);
        return 1;
    }
}