<?php

declare(strict_types=1);

namespace LosRomka\Shop\Controller;

use LosRomka\Shop\Repository\UserRepositoryInterface;
use LosRomka\Shop\View\UserPage;
use LosRomka\Shop\View\UsersPage;

class UsersController
{
    private UserRepositoryInterface $userRepository;
    private UsersPage $usersPage;
    private UserPage $userPage;

    public function __construct(UserRepositoryInterface $userRepository, UsersPage $usersPage, UserPage $userPage)
    {
        $this->userRepository = $userRepository;
        $this->usersPage = $usersPage;
        $this->userPage = $userPage;
    }

    public function showUsersAction(): string
    {
        $users = $this->userRepository->findAll();

        return $this->usersPage->render($users);
    }

    public function showUserAction(int $userId): string
    {
        $user = $this->userRepository->findById($userId);

        if ($user === null) {
            return 'не нашли';
        }

        return $this->userPage->render($user);
    }
}
