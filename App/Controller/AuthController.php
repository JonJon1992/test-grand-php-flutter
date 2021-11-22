<?php

namespace App\Controller;

use App\Security\TokenGenerated;
use App\Security\TokenSecurity;
use App\Services\UserServices;
use DateTime;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;


class AuthController
{
    private $security;

    public function __construct(Container $container)

    {
        $this->security = $container->offsetGet(TokenGenerated::class);
    }

    public function sign(Request $req, Response $res, array $args): Response
    {
        $data = $req->getParsedBody();
        $email = $data['email'];
        $pass = $data['pass'];
        $expire = $data['expire'];

        $service = new UserServices();
        $user = $service->findByEmail($email);

        if (is_null($user)) {
            return $res->withStatus(401);
        }
        if ($pass != $user->getPass()) {

            return $res->withStatus(401)->withJson(["message" => "E-mail or Password Invalid"]);
        }
        $payload = [
            'key' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'exp' => (new DateTime($expire))->getTimestamp()

        ];
        $token = JWT::encode($payload, getenv('SECRET_JWT'));
        $payloadRefreshToken = [
            'email' => $user->getEmail(),
            'key' => $user->getId(),

        ];
        $refresh = JWT::encode($payloadRefreshToken, getenv('SECRET_JWT'));

        $tokenSecurity = new TokenSecurity();
        $tokenSecurity->setExpire($expire)
            ->setToken($token)
            ->setRefreshToken($refresh)
            ->setUserId($user->getId());
        $this->security->generatedToken($tokenSecurity);
        return $res->withJson([
            "token" => $token, "refreshToken" => $refresh
        ]);


    }
}