<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Utils;

class ApiController extends Controller
{
    private $apiVersion = "v1.1";

    public function v1Action()
    {
        // Проверяем наличие параметра "method" в POST-запросе
        if (!isset($_POST["method"]) || empty($_POST["method"])) {
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Method not specified"
            ]);
        }

        // Обрабатываем доступные методы API
        $method = $_POST["method"];
        switch ($method) {
            case "some_method":
                $this->handleSomeMethod();
                break;
            case "another_method":
                $this->handleAnotherMethod();
                break;
            default:
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Invalid method"
                ]);
        }
    }

    private function handleSomeMethod()
    {
        // Логика обработки метода "some_method"
        Utils::sendAjaxRequest([
            "response" => true,
            "data" => "Result of some_method"
        ]);
    }

    private function handleAnotherMethod()
    {
        // Логика обработки метода "another_method"
        Utils::sendAjaxRequest([
            "response" => true,
            "data" => "Result of another_method"
        ]);
    }
}
