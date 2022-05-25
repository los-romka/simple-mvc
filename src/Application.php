<?php

declare(strict_types=1);

namespace LosRomka\Shop;

use LosRomka\Shop\Controller\HomeController;
use LosRomka\Shop\Controller\UsersController;
use LosRomka\Shop\Repository\UserRepository;
use LosRomka\Shop\Routing\UrlGenerator;
use LosRomka\Shop\View\HomePage;
use LosRomka\Shop\View\UserPage;
use LosRomka\Shop\View\UsersPage;

class Application
{
    public function run(): void
    {
        $urlGenerator = new UrlGenerator();

        $controller = new UsersController(
            new UserRepository(),
            new UsersPage($urlGenerator),
            new UserPage($urlGenerator)
        );

        $homeController = new HomeController(new HomePage($urlGenerator));

        $action = $_GET['action'] ?? '';

        if ($action === 'user') {
            echo $controller->showUserAction((int)$_GET['id']);
        } else if ($action === 'users') {
            echo $controller->showUsersAction();
        } else {
            echo $homeController->showHomeAction();
        }
    }
}
