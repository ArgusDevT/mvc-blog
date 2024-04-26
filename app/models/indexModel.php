<?php

namespace app\models;
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use app\interfaces\LocalCachedUI;

class indexModel extends Model
{
    function getData($id){
        $newsData = DataBase::Query("SELECT * FROM pages WHERE id = ?", [$id])[0];
        if($newsData != null)
            return $newsData;
        else
            header("Location: /");
    }
}