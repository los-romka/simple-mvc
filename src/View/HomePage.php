<?php

declare(strict_types=1);

namespace LosRomka\Shop\View;

use LosRomka\Shop\Model\User;
use LosRomka\Shop\Routing\UrlGenerator;

class HomePage
{
    private UrlGenerator $urlGenerator;

    public function __construct()
    {
        $this->urlGenerator = new UrlGenerator();
    }

    public function render(): string
    {
        $html = '<div>';

        $html .= '<div>Это домашнаяя страница</div>';

        $html .= "<div><a href=\"{$this->urlGenerator->users()}\">К списку пользователей</a></div>";

        $html .= '</div>';

        return $html;
    }
}
