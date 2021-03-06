<?php

declare(strict_types=1);

namespace LosRomka\Shop\View;

use LosRomka\Shop\Model\User;
use LosRomka\Shop\Routing\UrlGenerator;

class UserPage
{
    private UrlGenerator $urlGenerator;

    public function __construct(UrlGenerator $generator)
    {
        $this->urlGenerator = $generator;
    }

    public function render(User $user): string
    {
        $html = '<div>';

        $html .= '<div>Имя: ' . $user->getName() . '</div>';
        $html .= '<div>Дата рождения: ' . $user->getBirthdate()->format('Y-m-d') . '</div>';

        $html .= "<div><a href=\"{$this->urlGenerator->users()}\">К списку пользователей</a></div>";
        $html .= "<div><a href=\"{$this->urlGenerator->home()}\">Домой</a></div>";

        $html .= '</div>';

        return $html;
    }
}
