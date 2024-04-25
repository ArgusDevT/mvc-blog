<?php
namespace app\core;
use app\core\DataBase;
use app\core\Utils;

/**
*|-----------------------------------------------------------------
*|
*|  This file contains the parent class of all models, used
*|  to write functionality on the site, implementing the MVC
*|  design method.
*|
*|-----------------------------------------------------------------
**/

class Model
{
    protected $DataBase;

    function __construct()
    {
        $this->DataBase = new DataBase();
    }
}