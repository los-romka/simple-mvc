<?php

declare(strict_types=1);

namespace LosRomka\Shop\Controller;

use LosRomka\Shop\DependencyInjection\ServiceLocator;
use LosRomka\Shop\Repository\UserRepositoryInterface;
use LosRomka\Shop\View\HomePage;
use LosRomka\Shop\View\UsersPage;

class HomeController
{
    private HomePage $homePage;
    private ServiceLocator $serviceLocator;

    public function __construct(HomePage $homePage, ServiceLocator $serviceLocator)
    {
        $this->homePage = $homePage;
        $this->serviceLocator = $serviceLocator;
    }

    public function showHomeAction(): string
    {
        return $this->homePage->render();
    }

    public function showTopUsersAction(): string
    {
        /**
         * @var UserRepositoryInterface
         */
        $userRepository = $this->serviceLocator->get(UserRepositoryInterface::class);
        /**
         * @var UsersPage
         */
        $usersPage = $this->serviceLocator->get(UsersPage::class);

        $topUsers = array_slice($userRepository->findAll(), 0, 5);

        return $usersPage->render($topUsers);
    }
}
