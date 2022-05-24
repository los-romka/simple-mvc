<?php

declare(strict_types=1);

namespace LosRomka\Shop\Repository;

use LosRomka\Shop\Model\User;

class UserRepository
{
    private const USERS = [
        [
            'id' => 1,
            'name' => 'Vasya',
            'birthdate' => '2011-01-01',
        ],
        [
            'id' => 2,
            'name' => 'Tasya',
            'birthdate' => '2011-01-02',
        ]
    ];

    public function findAll(): array
    {
        $users = [];

        foreach (self::USERS as $u) {
            $user = new User($u['name'], new \DateTimeImmutable($u['birthdate']));
            $user->setId($u['id']);

            $users[] = $user;
        }

        return $users;
    }

    public function findById(int $id): ?User
    {
        foreach ($this->findAll() as $user) {
            if ($user->getId() === $id) {
                return $user;
            }
        }

        return null;
    }
}
