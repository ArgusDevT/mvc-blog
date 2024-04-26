<?php

namespace app\models;
use app\interfaces\sendCodeUI;
use app\interfaces\UserUI;
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use app\interfaces\LocalCachedUI;
use app\interfaces\SessionUI;
use app\interfaces\botUI;
use app\interfaces\userInterface;
use PhpOption\None;
use Stripe\Util\Util;

class apiModel extends Model
{
    public function getNews()
    {
        $temp_chached = LocalCachedUI::getCache("last_news");

        if($temp_chached != null){
            $news = $temp_chached;
        }
        else{
            $news = DataBase::Query("SELECT * FROM pages");
            LocalCachedUI::createCached("last_news", $news, 72);
        }

        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $itemsPerPage = $_ENV["COUNT_NEWS_IN_PAGE"];
        
        $startIndex = ($page - 1) * $itemsPerPage;
        $pagedNews = array_slice($news, $startIndex, $itemsPerPage);
        
        Utils::sendAjaxRequest([
            'response' => true,
            'news' => $pagedNews,
            'totalPages' => ceil(count($news) / $itemsPerPage)
        ]);

    }
}
