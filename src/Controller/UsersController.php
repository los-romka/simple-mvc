<?php

declare(strict_types=1);

namespace LosRomka\Shop\Controller;

use LosRomka\Shop\Repository\UserRepository;
use LosRomka\Shop\View\UserPage;
use LosRomka\Shop\View\UsersPage;

class UsersController
{
    public function showUsersAction(): string
    {
        $userRepository = new UserRepository();

        $users = $userRepository->findAll();

        $view = new UsersPage();
        return $view->render($users);
    }

    public function showUserAction(int $userId): string
    {
        $userRepository = new UserRepository();

        $user = $userRepository->findById($userId);

        if ($user === null) {
            return 'не нашли';
        }

        $view = new UserPage();
        return $view->render($user);
    }
}
