<?php

require_once '../vendor/autoload.php';

session_start();

$router = new AltoRouter();


if(array_key_exists('BASE_URI', $_SERVER))
{
    $router->setBasePath($_SERVER['BASE_URI']);
}
else
{
    $_SERVER['BASE_URI'] = '/';
}

$router->map('GET', '/', ['controller' => 'MainController',  'method' => 'main'], 'main');

$router->map('POST', '/register', ['controller' => 'MainController',  'method' => 'register'], 'register');

$router->map('POST', '/login', ['controller' => 'MainController',  'method' => 'login'], 'login');

$router->map('GET', '/home', ['controller' => 'MainController',  'method' => 'home'], 'home');

$match = $router->match();

if ($match === FALSE)
{
    $controller = new \App\Controllers\ErrorController();
    $controller->err404();
}
else{
    $controllerToUse = "\App\Controllers\\" . $match['target']['controller'];
    $methodToCall = $match['target']['method'];

    $controller = new $controllerToUse();
    $controller->$methodToCall($match['params']);
}
