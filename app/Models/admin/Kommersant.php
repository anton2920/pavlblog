<?php


namespace App\Models\admin;

use DiDom\Document;

class Kommersant extends News
{
    public function getNews()
    {
        $lenta = new Document('https://www.kommersant.ru/', true);
        $links    = $lenta->find('.b-newsline__item');

        foreach ($links as $key => $link){

            if(strripos($link, 'hotnews') !== false) {
                continue;
            }

            $url = 'https://www.kommersant.ru/' . $link->find('a')[0]->attr('href');
            $document = new Document($url, 1);

            $news['title']       = $document->find('.article_name')[0]->text();
            $news['author']      = 'Kommersant.ru';
            $news['date']        = $document->find('.title__cake')[0]->text();
            $news['img']         = '';
            $news['description'] = $document->find('.b-article__text')[0]->text();
            $news['content']     = '';
            $news['link']        = $url;

            foreach ($document->find('.b-article__text') as $part){
                $news['content'] = $news['content'] . $part;
            }

            if($this->saveNews($news) === -1){
                break;
            }
        }
    }
}