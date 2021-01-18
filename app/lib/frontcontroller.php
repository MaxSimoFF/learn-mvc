<?php
namespace PHPMVC\Lib;

class FrontController {

    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\NotFoundController';
    const NOT_FOUND_ACTION = 'notFoundAction';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = [];

    public function __construct()
    {
        $this->_parseUrl();
    }
    
    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
        $this->_controller = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
        $this->_action = (isset($url[1]) && $url[1] != '') ? $url[1] : 'default';
        $this->_params = (isset($url[2]) && $url[2] != '') ? explode('/', $url[2]) : [];
    }
    
    public function dispatch()
    {
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';
        if (!class_exists($controllerClassName)) {
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if (!method_exists($controller, $actionName)) {
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$actionName();
    }
}