<?php

use App\Controllers\HomeController;
use App\Controllers\SwaggerMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get(
    '/',
    [HomeController::class, 'index']
);

$app->get(
    '/api-docs',
    [SwaggerMiddleware::class, 'handle']
);

$app->get(
    '/api-docs/schema',
    [SwaggerMiddleware::class, 'schema']
);
