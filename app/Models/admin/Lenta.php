<?php


namespace App\Models\admin;

use DiDom\Document;

class Lenta extends News
{
    public function getNews()
    {
        $lenta = new Document('https://lenta.ru/', true);
        $links    = $lenta->find('.item');

        foreach ($links as $key => $link){

            if(strripos($link, 'http') !== false) {
                continue;
            }

            $url = 'https://lenta.ru' . $link->firstChild()->attr('href');
            $document = new Document($url, 1);

            if( $document->has('.b-topic__title')   &&
                $document->has('.g-date')           &&
                $document->has('.g-picture')        &&
                $document->has('.js-topic__text')   &&
                $document->has('.js-topic__text')
            ){
                $news['title']       = $document->find('.b-topic__title')[0]->text();
                $news['author']      = 'Lenta.ru';
                $news['date']        = $document->find('.g-date')[0]->text();
                $news['img']         = $document->find('.g-picture')[0]->attr('src');
                $news['description'] = $document->find('.js-topic__text')[0]->firstChild()->text();
                $news['content']     = '';
                $news['link']        = $url;

                foreach ($document->find('.js-topic__text')[0]->find('p') as $part){
                    $news['content'] = $news['content'] . $part;
                }

/*                echo '<pre>' . print_r($news, 1) . '</pre>';*/
                if($this->saveNews($news) === -1){
                    break;
                }
            }
        }
    }


}