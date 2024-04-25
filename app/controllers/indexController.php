<?php

namespace app\controllers;
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\interfaces\SessionUI;


class indexController extends Controller
{

    function index()
    {
        $this
            ->view
            ->run();
    }
}