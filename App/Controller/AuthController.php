<?php

namespace App\Controller;

use App\Error\ExceptionMessageHandle;
use App\Security\TokenGenerated;
use App\Security\TokenSecurity;
use App\Services\UserServices;
use DateTime;
use Exception;
use Firebase\JWT\JWT;
use InvalidArgumentException;
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

        try {
            if (is_null($user)) {
                return $res->withStatus(401)->withJson(["message" => "USER NOT FOUND"]);
            }
            if ($email != $user->getEmail()) {
                return $res->withStatus(401)->withJson(["message" => "E-mail or Password Invalid"]);
            }
            if ($pass != $user->getPass()) {
                return $res->withStatus(401)->withJson(["message" => "E-mail or Password Invalid"]);
            }
            try {
                $payload = [
                    'key' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'exp' => (new DateTime($expire))->getTimestamp()


                ];
            } catch (Exception $e) {
                return $res->withStatus(400)->withJson(array(
                    "status" => 400,
                    "error" => ExceptionMessageHandle::class,
                    "message" => 'Não foi possivel criar o token!'
                ));

            }
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
        } catch (ExceptionMessageHandle $e) {
            return $res->withStatus(400)->withJson([
                "status" => 400,
                "error" => ExceptionMessageHandle::class,
                "message" => 'Houve um Error ao Realizar Login!'

            ]);
        }
    }

    public function signWithSocial(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $email = $data['email'];
        $uid = $data['uid'];
        $expire = $data['expire'];
        try {
            $payload = [
                'email' => $email,
                'uid' => $uid,
                'exp' => (new DateTime($expire))->getTimestamp()
            ];
        } catch (InvalidArgumentException $e) {
            return $response->withStatus(400)->withJson(array(
                "status" => 400,
                "error" => ExceptionMessageHandle::class,
                "message" => 'Não foi possivel criar o token!'

            ));
        }

        $token = JWT::encode($payload, getenv('SECRET_JWT'));
        return $response->withJson([
            "token" => $token
        ]);
    }
}
