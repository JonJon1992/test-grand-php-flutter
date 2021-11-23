<?php

use App\Controller\{AuthController, EventController, NewsController};
use function App\Auth\jwtAuthToken;
use function App\Config\{configuration};


$application = new \Slim\App(configuration());


$application->get('/events', EventController::class . ':findEvent')->add(jwtAuthToken());
$application->get('/news', NewsController::class . ':findAllNews');
$application->post('/sign', AuthController::class . ':sign');
$application->post('/sign/social', AuthController::class . ':signWithSocial');
$application->run();
