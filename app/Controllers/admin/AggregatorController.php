<?php


namespace App\Controllers\admin;


use App\Models\admin\Gazeta;
use App\Models\admin\Kommersant;
use App\Models\admin\Lenta;

class AggregatorController extends AdminController
{
    public function menuAction()
    {

    }

    public function updateAction()
    {

        if(!empty($_POST)){
            if(isset($_POST['LENTA'])) {
                $LENTA = new Lenta();
                $LENTA->getNews();
            }

            if(isset($_POST['KOMMERSANT'])) {
                $KOMMERSANT = new Kommersant();
                $KOMMERSANT->getNews();
            }

            if(isset($_POST['GAZETA'])) {
                $GAZETA = new Gazeta();
                $GAZETA->getNews();
            }
            header("Location: /admin/aggregator/menu");
            exit;
        }

        $LENTA = new Lenta();
        $KOMMERSANT = new Kommersant();
        $GAZETA = new Gazeta();

        $LENTA->getNews();
        $KOMMERSANT->getNews();
        $GAZETA->getNews();
        return 'success';
    }
}