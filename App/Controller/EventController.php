<?php

namespace App\Controller;

use App\Services\EventServices;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;

final class EventController
{

    private $service;

    public function __construct(Container $container)
    {
        $this->service = $container->offsetGet(EventServices::class);
    }

    public function findEvent(Request $req, Response $res, array $args): Response
    {
        $events = $this->service->findEventAll();
        $res->getBody()->write(json_encode($events, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        return $res->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
