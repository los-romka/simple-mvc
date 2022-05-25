<?php

declare(strict_types=1);

namespace LosRomka\Shop\DependencyInjection;

class ServiceLocator
{
    private array $services;

    public function set(string $name, $service)
    {
        $this->services[$name] = $service;
    }

    public function get(string $name)
    {
        if (!isset($this->services[$name])) {
            throw new \Exception("service `$name` not found");
        }

        if (is_callable($this->services[$name])) {
            $this->services[$name] = $this->services[$name]($this);
        }

        return $this->services[$name];
    }
}
