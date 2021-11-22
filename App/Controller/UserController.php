<?php

use App\Entities\Users;
use App\Services\UserServices;
use Slim\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class UserController
{
    private $services;

    public function __construct(Container $container)
    {
        $this->services = $container->offsetGet(UserServices::class);
    }
    public function insert(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();
        $user = new Users();

        $user->setEmail($data['email']->setName($data['name'])->setPass($data['pass']));

        $this->services->create($user);
        $response = $response->withJson(['message' => 'Usuario cadastrado com sucesso.!']);
        return $response;
    }
}
