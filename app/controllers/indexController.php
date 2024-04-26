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
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template")
            ]);
    }

    function page()
    {

        if(!isset($_GET["id"]) || empty($_GET["id"]))
            header("Location: /");

        $newsData = $this->model->getData($_GET["id"]);

        $this
            ->view
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template"),
                "TITLE" => $newsData["title"],
                "DESCRIPTION" => $newsData["description"],
                "BODY" => $newsData["body"]
            ]);
    }
}