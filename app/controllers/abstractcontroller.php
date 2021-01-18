<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\FrontController;

class AbstractController {

    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = [];

    public function notFoundAction()
    {
        $this->_view();
    }

    public function setController($controllerName)
    {
        $this->_controller = $controllerName;
    }
    public function setAction($actionName)
    {
        $this->_action  = $actionName;
    }
    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function getParams()
    {
        return $this->_params;
    }

    protected function _view()
    {
        if ($this->_action == FrontController::NOT_FOUND_ACTION) {
            require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
        } else {
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if (file_exists($view)) {
                require_once VIEWS_PATH . 'template/header.php';
                extract($this->_data);
                require_once $view;
                require_once VIEWS_PATH . 'template/footer.php';
            } else {
                require_once VIEWS_PATH . DS. 'notfound' . DS . 'noview.view.php';
            }
        }
    }
}