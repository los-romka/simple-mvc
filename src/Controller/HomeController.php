<?php

declare(strict_types=1);

namespace LosRomka\Shop\Controller;

use LosRomka\Shop\View\HomePage;

class HomeController
{
    public function showHomeAction(): string
    {
        $view = new HomePage();
        return $view->render();
    }
}
