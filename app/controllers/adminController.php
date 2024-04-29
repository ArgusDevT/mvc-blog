<?php

namespace app\controllers;
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\interfaces\SessionUI;

class adminController extends Controller
{
    public function apanel()
    {
        if(SessionUI::get("auth") != null)
            header("Location: /apanel/pages");


        $this
            ->view
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template"),
            ]);
    }

    public function apanel_pages()
    {
        SessionUI::set("CRSF_TOKEN", bin2hex(random_bytes(32)));

        $this
            ->view
            ->render_html([
                "HEADER" => Utils::getTemplates("header.template"),
                "CRSF_TOKEN" => SessionUI::get("CRSF_TOKEN")
            ]);
    }
}