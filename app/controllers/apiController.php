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
        if($_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'PUT'){
            parse_str(file_get_contents("php://input"), $data);
            $method = $data["method"];
        }
        else{
            $method = $_POST["method"] != null ? $_POST["method"] : $_GET["method"];
        }
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

            case "createNews":
                Validations::crsf($_POST["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::createNews($_POST["title"], $_POST["description"], $_POST["body"]);
                $this->model->createNews($_POST["title"], $_POST["description"], $_POST["body"]);
                break;

            case "deleteNews":
                if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                    parse_str(file_get_contents("php://input"), $data);
                    Validations::crsf($data["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                    Validations::deleteNews($data["delid"]);
                    $this->model->deleteNews($data["delid"]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => false,
                        "error" => "Method not specified"
                    ]);
                }
                break;

            case "saveNews":
                if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                    parse_str(file_get_contents("php://input"), $data);
                    Validations::crsf($data["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                    Validations::saveNews($data["title"], $data["description"], $data["body"], $data["id"]);
                    $this->model->saveNews($data["title"], $data["description"], $data["body"], $data["id"]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => false,
                        "error" => "Method not specified"
                    ]);
                }
                break;

            case "getEditNews":
                Validations::crsf($_GET["crsf_token"], SessionUI::get("CRSF_TOKEN"));
                Validations::getEditNews($_GET["id"]);
                $this->model->getEditNews($_GET["id"]);
                break;

            default:
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Invalid method"
                ]);
        }
    }
}
