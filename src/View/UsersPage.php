<?php

declare(strict_types=1);

namespace LosRomka\Shop\View;

use JetBrains\PhpStorm\Pure;
use LosRomka\Shop\Model\User;
use LosRomka\Shop\Routing\UrlGenerator;

class UsersPage
{
    private UrlGenerator $urlGenerator;

    public function __construct()
    {
        $this->urlGenerator = new UrlGenerator();
    }

    /**
     * @param User[] $users
     *
     * @return string
     */
    #[Pure]
    public function render(array $users): string
    {
        $html = '<ul>';

        foreach ($users as $user) {
            $html .= "<li>
                           <a href=\"{$this->urlGenerator->user($user->getId())}\">{$user->getName()}</a>
                      </li>";
        }

        $html .= '</li>';

        return $html;
    }
}