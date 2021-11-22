<?php

namespace App\Config;

use App\Security\TokenGenerated;
use App\Services\EventServices;
use App\Services\NewServices;
use App\Services\UserServices;

function configuration(): \Slim\Container
{
    $settings = [
        "settings" => [
            'displayErrorDetails' => true
        ]
    ];
    $container = new \Slim\Container($settings);
    $container->offsetSet(EventServices::class, new EventServices());
    $container->offsetSet(TokenGenerated::class, new TokenGenerated());
    $container->offsetSet(NewServices::class, new NewServices());
    $container->offsetSet(UserServices::class, new UserServices());
    return $container;
}
