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
        // SessionUI::set("CRSF_TOKEN", bin2hex(random_bytes(32)));

        $this
            ->view
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template"),
                // "CRSF_TOKEN" => SessionUI::get("CRSF_TOKEN")
            ]);
    }

    function page()
    {

        // SessionUI::set("CRSF_TOKEN", bin2hex(random_bytes(32)));

        if(!isset($_GET["id"]) || empty($_GET["id"]))
            header("Location: /");

        $newsData = $this->model->getData($_GET["id"]);

        $this
            ->view
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template"),
                "TITLE" => $newsData["title"],
                "DESCRIPTION" => $newsData["description"],
                "BODY" => $newsData["body"],
                // "CRSF_TOKEN" => SessionUI::get("CRSF_TOKEN")
            ]);
    }
}