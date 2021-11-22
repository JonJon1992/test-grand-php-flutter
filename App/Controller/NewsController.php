<?php

namespace App\Controller;

use App\Services\NewServices;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;

final class NewsController
{
    private $services;

    public function __construct(Container $container)
    {
        $this->services = $container->offsetGet(NewServices::class);
    }

    public function findAllNews(Request $req, Response $res, array $args): Response
    {
        $news = $this->services->findAllNews();
        $res->getBody()->write(json_encode($news, JSON_INVALID_UTF8_IGNORE | JSON_UNESCAPED_SLASHES));
        return $res->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
