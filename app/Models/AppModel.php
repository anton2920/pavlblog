<?php

namespace App\Models;

use Blog\Base\Model;

class AppModel extends Model
{
    /**
     * @return array
     */
    public function getExistCategories()
    {
        return \R::find('categories', 'WHERE countarticleid > 0');
    }
}