<?php

declare(strict_types=1);

namespace LosRomka\Shop\Routing;

class UrlGenerator
{
    public function home(): string
    {
        return '/';
    }

    public function users(): string
    {
        return '/?' . http_build_query(
                [
                    'action' => 'users',
                ]
            );
    }

    public function topUsers(): string
    {
        return '/?' . http_build_query(
                [
                    'action' => 'top',
                ]
            );
    }

    public function user(int $id): string
    {
        return '/?' . http_build_query(
                [
                    'action' => 'user',
                    'id' => $id
                ]
            );
    }
}
