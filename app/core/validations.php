<?php
namespace app\core;
use app\core\Utils;
use app\interfaces\SessionUI;

/**
*|-----------------------------------------------------------------
*|
*|  This file contains a validation functions
*|
*|-----------------------------------------------------------------
**/

class Validations
{
    /**
    *|-----------------------------------------------------------------
    *|  @param string $mail
    *|  @param string $pass
    *|  Валидация почты и пароля
    *|-----------------------------------------------------------------
    **/
    static function getNews($page)
    {
        if(empty($page))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => '$page not found'
            ]);
    }
}