<?php
namespace app\core;
use app\core\Utils;

/**
*|-----------------------------------------------------------------
*|
*|  This file contains a validation functions
*|
*|-----------------------------------------------------------------
**/

class Validations
{
    static function crsf($crsf, $session_crsf){
        if(empty($crsf) || !isset($crsf))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => '$crsf not found'
            ]);

        if($crsf != $session_crsf)
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => '$crsf incorrect'
            ]);
    }

    static function pageExists($page)
    {
        if(empty($page) || !isset($page))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => '$page not found'
            ]);
    }

    static function getComments($page, $idPage)
    {
        if(empty($page) || !isset($page))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => '$page not found'
            ]);
        
        if(empty($idPage) || !isset($idPage))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => '$idPage not found'
            ]);
    }

    static function login($username, $password)
    {
        if(empty($username) || !isset($username))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => 'Логин не может быть пустым'
            ]);
        
        if(empty($password) || !isset($password))
            Utils::sendAjaxRequest([
                'response' => false,
                'error' => 'Пароль не может быть пустым'
            ]);
    }

    static function createComment($name, $comment)
    {
        if(empty($name) || !isset($name))
            Utils::sendAjaxRequest(['response' => false, 'error' => 'Имя не может быть пустым']);
        if(strlen($name) > 30 || strlen($name) < 5)
            Utils::sendAjaxRequest(['response' => false, 'error' => 'Имя не должно быть не менее 5 и не более 30 символов']);
        if(empty($comment) || !isset($comment))
            Utils::sendAjaxRequest(['response' => false,'error' => 'Введите текст комментария']);
        if(strlen($comment) > 228 || strlen($comment) < 30)
            Utils::sendAjaxRequest(['response' => false, 'error' => 'Комментарий не должен быть не менее 30 и не более 228 символов']);
    }
}