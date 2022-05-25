<?php

declare(strict_types=1);

namespace LosRomka\Shop\Controller;

use LosRomka\Shop\View\HomePage;

class HomeController
{
    private HomePage $homePage;

    public function __construct(HomePage $homePage)
    {
        $this->homePage = $homePage;
    }

    public function showHomeAction(): string
    {
        return $this->homePage->render();
    }
}
