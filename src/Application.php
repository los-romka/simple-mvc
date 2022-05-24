<?php

declare(strict_types=1);

namespace LosRomka\Shop;

use LosRomka\Shop\Controller\HomeController;
use LosRomka\Shop\Controller\UsersController;

class Application
{
    public function run(): void
    {
        $controller = new UsersController();
        $homeController = new HomeController();

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
