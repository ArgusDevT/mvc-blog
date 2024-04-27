<?php

namespace app\controllers;
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\interfaces\SessionUI;

class adminController extends Controller
{
    function apanel()
    {
        $this
            ->view
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template"),
            ]);
    }
}