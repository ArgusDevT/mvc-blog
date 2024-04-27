<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Utils;
use app\core\Validations;
use app\interfaces\SessionUI;

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
                // Validations::crsf($_POST["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::pageExists($_POST["page"]);
                $this->model->getNews();
                break;

            case "createComment":
                // Validations::crsf($_POST["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::createComment($_POST["name"], $_POST['comment']);
                $this->model->createComment($_POST["page"], $_POST["name"], $_POST['comment']);
                break;

            case "getComments":
                // Validations::crsf($_POST["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::getComments($_POST["page"], $_POST["idPage"]);
                $this->model->getComments();
                break;

            default:
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Invalid method"
                ]);
        }
    }
}
