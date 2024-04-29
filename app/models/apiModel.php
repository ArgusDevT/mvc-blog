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

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $itemsPerPage = $_ENV["COUNT_NEWS_IN_PAGE"];
        
        $startIndex = ($page - 1) * $itemsPerPage;
        $pagedNews = array_slice($news, $startIndex, $itemsPerPage);
        
        Utils::sendAjaxRequest([
            'response' => true,
            'news' => $pagedNews,
            'totalPages' => ceil(count($news) / $itemsPerPage)
        ]);

    }

    public function getComments(){

        $temp_chached = LocalCachedUI::getCache("comments_chached_". $_GET['idPage']);

        if($temp_chached != null){
            $comments = $temp_chached;
        }
        else{
            $comments = DataBase::Query("SELECT * FROM comments WHERE pages = ?", [$_GET['idPage']]);

            if($comments != null)
                LocalCachedUI::createCached("comments_chached_". $_GET['idPage'], $comments, 72);
        }

        $totalPages = 0;
        if($comments != null)
        {
            $comments = DataBase::Query("SELECT * FROM comments WHERE pages = ?", [$_GET['idPage']]);

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $itemsPerPage = $_ENV["COUNT_COMMENT_IN_PAGE"];
            
            $startIndex = ($page - 1) * $itemsPerPage;
            $pagedComments = array_slice($comments, $startIndex, $itemsPerPage);

            $totalPages = ceil(count($comments) / $itemsPerPage);
        }
        
        Utils::sendAjaxRequest([
            'response' => true,
            'comments' => $pagedComments,
            'totalPages' => $totalPages
        ]);
    }

    public function createComment($page, $name, $comment){
        DataBase::QueryUpd("INSERT INTO comments(name, comment, pages) VALUES(?,?,?)",[
            $name,
            $comment,
            $page
        ]);
        LocalCachedUI::clearChached([
            "comments_chached_". $page
        ]);
        Utils::sendAjaxRequest([
            'response' => true
        ]);
    }

    public function login($username, $login){
        // Реализация через бд была убрана для экономии времени
        // Тут должна быть проверка на существование такой записи в бд
        if($username == "admin" || $login == "admin"){

            SessionUI::set("auth", true);

            Utils::sendAjaxRequest([
                'response' => true
            ]);
        }
        else{
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => "Аккаунт не существует"
            ]);
        }
    }
}
