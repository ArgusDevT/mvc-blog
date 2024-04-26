<?php
namespace app\core;

/**
*|-----------------------------------------------------------------
*|
*|  This file contains a parent class, this class is
*|  responsible for control and quality of connections
*|  (What the user can do)
*|
*|-----------------------------------------------------------------
**/

class Controller
{
    protected $model;
    protected $view;
    
    /**
    *|-----------------------------------------------------------------
    *|  @param string $controllerName - Name controller in folder
    *|  @param string $actionName - Name action(func) in controller(up)
    *|  @param string $modelName - Name model in folder
    *|-----------------------------------------------------------------
    **/
    public function __construct($controllerName, $actionName, $modelName)
    {
        $this->loadModel($modelName);
        $this->initializeView($controllerName, $actionName); 
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $modelName - Name controller in folder
    *|-----------------------------------------------------------------
    **/

    protected function loadModel($modelName)
    {
        $modelClass = 'app\\models\\' . ucfirst($modelName) . 'Model';
        if (class_exists($modelClass)) {
            $this->model = new $modelClass();
        } else {
            throw new \Exception("Model '{$modelName}' not found");
        }
    }

    /**
    *|-----------------------------------------------------------------
    *|
    *|  Initializes the View for the controller.
    *|
    *| @param string $controllerName Controller name
    *| @param string $actionName Name of the action (method) in the controller
    *|-----------------------------------------------------------------
    **/
    protected function initializeView($controllerName, $actionName)
    {
        $this->view = new View($controllerName, $actionName);
    }


    /**
    *|-----------------------------------------------------------------
    *| Returns the model object associated with the controller
    *|
    *| @return object Model
    *|-----------------------------------------------------------------
    **/
    protected function getModel()
    {
        return $this->model;
    }

    /**
    *|-----------------------------------------------------------------
    *| Returns a View object.
    *|
    *| @return View View
    *|-----------------------------------------------------------------
    **/
    protected function getView()
    {
        return $this->view;
    }
}