<?php

namespace App\Controllers;

class CoreController
{
    protected function render(string $viewName, $viewParams = [] ) 
    {
        global $router;



        $viewParams['currentPage'] = $viewName;

        $viewParams['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';

        $viewParams['baseUri'] = $_SERVER['BASE_URI'];

        extract($viewParams);

        require_once __DIR__.'/../views/layout/header.html.php';
        require_once __DIR__.'/../views/'.$viewName.'.html.php';
        require_once __DIR__.'/../views/layout/footer.html.php';
    }
}