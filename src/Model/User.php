<?php

declare(strict_types=1);

namespace LosRomka\Shop\Model;

use DateTimeImmutable;

class User
{
    private int $id;
    private string $name;
    private DateTimeImmutable $birthdate;

    public function __construct(string $name, DateTimeImmutable $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthdate(): DateTimeImmutable
    {
        return $this->birthdate;
    }
}