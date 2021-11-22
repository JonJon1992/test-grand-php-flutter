<?php

namespace App\Auth;

use Tuupola\Middleware\JwtAuthentication;

function jwtAuthToken(): JwtAuthentication
{
    return new JwtAuthentication(['secret' => getenv('SECRET_JWT'), 'attribute' => 'jwt']);
}
