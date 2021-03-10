<?php


namespace App\Models\admin;

use DiDom\Document;

class Gazeta extends News
{
    public function getNews()
    {
        $gazeta = new Document('https://rg.ru/', true);
        $links    = $gazeta->find('.b-link_title');

        for($i = 0; $i<10; $i++){
            $pages[] = $links[$i]->attr('href');
        }

        foreach ($pages as $page){
            $url = 'https://rg.ru/' . $page;
            $document = new Document($url, 1);
            $article = $document->find('.l-page__wrapper')[0];
            $content = $document->find('.b-material-wrapper__text')[0];

            $news['author']      = 'Российская газета';

            $news['title']       = $article->find('.b-material-head__title')[0]->text();
            $news['date']        = $article->find('.b-material-head__date')[0]->text();
            $news['description'] = $content->find('p')[0]->text();
            $news['content']     = '';
            $news['link']        = $url;
            $news['img']         = '';
            foreach ($content->find('p') as $part){
                $news['content'] = $news['content'] . trim($part);
            }


            if($this->saveNews($news) === -1){
                break;
            }
        }
    }


}