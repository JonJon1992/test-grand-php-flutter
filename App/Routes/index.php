<?php

use App\Controller\{AuthController, EventController, NewsController, UserController};
use function App\Auth\jwtAuthToken;
use function App\Config\{configuration};


$application = new \Slim\App(configuration());


$application->get('/events', EventController::class . ':findEvent')->add(jwtAuthToken());
$application->get('/news', NewsController::class . ':findAllNews');
$application->post('/sign', AuthController::class . ':sign');
$application->post('/create', UserController::class . ':insert');
$application->run();
