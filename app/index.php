<?php

require_once './config.php';
//use App\config;

$route = $_GET['route'] ?? 'home';

$controllerName = 'App\\Controllers\\' . ucfirst($route) . 'Controller';
$actionName = 'indexAction';

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        echo "404 - Action bulunamadı!";
    }
} else {
    echo "404 - Controller bulunamadı!";
}
