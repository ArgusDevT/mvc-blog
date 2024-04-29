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
        $method = $_POST["method"] != null ? $_POST["method"] : $_GET["method"];
        if (!isset($method) || empty($method)) {
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Method not specified"
            ]);
        }

        switch ($method) {

            case "getNews":
                Validations::crsf($_GET["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::pageExists($_GET["page"]);
                $this->model->getNews();
                break;

            case "createComment":
                Validations::crsf($_POST["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::createComment($_POST["name"], $_POST['comment']);
                $this->model->createComment($_POST["page"], $_POST["name"], $_POST['comment']);
                break;

            case "getComments":
                Validations::crsf($_GET["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::getComments($_GET["page"], $_GET["idPage"]);
                $this->model->getComments();
                break;

            case "login":
                Validations::crsf($_POST["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::login($_POST["username"], $_POST["password"]);
                $this->model->login($_POST["username"], $_POST["password"]);
                break;

            default:
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Invalid method"
                ]);
        }
    }
}
