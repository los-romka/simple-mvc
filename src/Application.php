<?php

declare(strict_types=1);

namespace LosRomka\Shop;

use LosRomka\Shop\Controller\HomeController;
use LosRomka\Shop\Controller\UsersController;
use LosRomka\Shop\DependencyInjection\ServiceLocator;
use LosRomka\Shop\Repository\UserRepository;
use LosRomka\Shop\Repository\UserRepositoryInterface;
use LosRomka\Shop\Routing\UrlGenerator;
use LosRomka\Shop\View\HomePage;
use LosRomka\Shop\View\UserPage;
use LosRomka\Shop\View\UsersPage;

class Application
{
    private ServiceLocator $serviceLocator;

    public function __construct()
    {
        $serviceLocator = new ServiceLocator();

        $serviceLocator->set(UrlGenerator::class, new UrlGenerator());

        $serviceLocator->set(UsersPage::class, function (ServiceLocator $serviceLocator) {
            return new UsersPage($serviceLocator->get(UrlGenerator::class));
        });

        $serviceLocator->set(UserPage::class, new UserPage($serviceLocator->get(UrlGenerator::class)));
        $serviceLocator->set(HomePage::class, new HomePage($serviceLocator->get(UrlGenerator::class)));
        $serviceLocator->set(UserRepository::class, new UserRepository());
        $serviceLocator->set(UserRepositoryInterface::class, $serviceLocator->get(UserRepository::class));
        $serviceLocator->set(
            UsersController::class,
            new UsersController(
                $serviceLocator->get(UserRepositoryInterface::class),
                $serviceLocator->get(UsersPage::class),
                $serviceLocator->get(UserPage::class),
            )
        );
        $serviceLocator->set(
            HomeController::class,
            new HomeController(
                $serviceLocator->get(HomePage::class),
                $serviceLocator
            )
        );

        $this->serviceLocator = $serviceLocator;
    }

    public function run(): void
    {
        $action = $_GET['action'] ?? '';

        if ($action === 'top') {
            echo $this->serviceLocator->get(HomeController::class)->showTopUsersAction();
        } else if ($action === 'user') {
            echo $this->serviceLocator->get(UsersController::class)->showUserAction((int)$_GET['id']);
        } else if ($action === 'users') {
            echo $this->serviceLocator->get(UsersController::class)->showUsersAction();
        } else {
            echo $this->serviceLocator->get(HomeController::class)->showHomeAction();
        }
    }
}
