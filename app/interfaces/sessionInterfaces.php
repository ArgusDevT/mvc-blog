<?php
namespace app\interfaces;

/**
*|-----------------------------------------------------------------
*|  @param interface_sessionInterface
*|  Реализация интерфесай sendCode
*|-----------------------------------------------------------------
**/

interface sessionInterface
{
    public static function start();
    public static function set($key, $value);
    public static function get($key);
    public static function destry();
    public static function destryParams($key);
}

/**
*|-----------------------------------------------------------------
*|  @param class_sendCode
*|  Класс отпарвки кода
*|-----------------------------------------------------------------
**/

class SessionUI implements sessionInterface
{
    public static function start()
    {
        @session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return null;
    }

    public static function destryParams($key){
        unset($_SESSION[$key]);
    }

    public static function destry()
    {
        @session_destroy();
    }
}