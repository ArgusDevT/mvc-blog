<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Utils;

class ApiController extends Controller
{
    private $apiVersion = "v1.1";

    public function v1()
    {
        if (!isset($_POST["method"]) || empty($_POST["method"])) {
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Method not specified"
            ]);
        }

        $method = $_POST["method"];
        switch ($method) {

            case "getNews":
                $this->model->getNews();
                break;

            default:
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Invalid method"
                ]);
        }
    }
}
