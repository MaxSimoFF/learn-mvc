<?php
namespace PHPMVC;

use PHPMVC\Lib\FrontController;

require_once '../app/config.php';
require_once APP_PATH . 'lib/autoload.php';
$frontController = new FrontController();
$frontController->dispatch();