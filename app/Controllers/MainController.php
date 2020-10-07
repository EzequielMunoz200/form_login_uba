<?php

namespace App\Controllers;



class MainController extends CoreController
{
    public function main()
    {

        $this->render(
            'main/main',
            [
                'message' => 'hello world'
            ]
        );
    }

}