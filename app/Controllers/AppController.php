<?php

namespace App\Controllers;

use Blog\Base\Controller;

class AppController extends Controller
{
    /**
     * @return int
     */
    protected function getPageNumber()
    {
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }
}