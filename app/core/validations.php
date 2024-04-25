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
    static function MailAndPass($mail, $pass)
    {
        if(empty($mail) || empty($pass))
        Utils::sendAjaxRequest([
            'success' => false,
            'message' => 'Поля не могут быть пусты'
        ]);

        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $mail))
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => 'Почта введена некорректно'
            ]);

        if(strlen($pass) < 8) 
        {
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => 'Пароль слишком простой'
            ]);
        }
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $code
    *|  Валидация введенного кода
    *|-----------------------------------------------------------------
    **/
    static function emptyCode($code)
    {
        if(empty($code))
        {
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => 'Заполните поле'
            ]);
        }
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $title
    *|  @param int $lang
    *|  @param int $template
    *|  Проверяем ввод названия бота, переданные языки и шаблоны
    *|-----------------------------------------------------------------
    **/
    static function createBot($code, $lang, $template)
    {
        if(SessionUI::get("Auth") != true)
        {
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => '429 - Отказано в доступе, требуется аутентификация'
            ]);
        }

        if(empty($code))
        {
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => 'Название бота не введено'
            ]);
        }

        if(empty($lang))
        {
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => 'Язык не выбран'
            ]);
        }

        if($template == "")
        {
            Utils::sendAjaxRequest([
                'success' => false,
                'message' => 'Шаблон не выбран' . $template
            ]);
        }
    }

}