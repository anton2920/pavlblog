<?php


namespace App\Controllers\admin;


use App\Models\admin\Kommersant;
use App\Models\admin\Lenta;

class AggregatorController extends AdminController
{
    public function menuAction()
    {

    }

    public function updateAction()
    {
        if(empty($_POST)){
            $_SESSION['aggregator'] = 'No editions selected. Unable to search.';
            header("Location: /admin/aggregator/menu");
            exit;
        }

        if(isset($_POST['LENTA'])) {
            $LENTA = new Lenta();
            $LENTA->getNews();
        }

        if(isset($_POST['KOMMERSANT'])) {
            $KOMMERSANT = new Kommersant();
            $KOMMERSANT->getNews();
        }

        if(isset($_POST['CNN'])) {
          //  echo 'CNN ';
        }

        header("Location: /admin/aggregator/menu");
        exit;
    }
}