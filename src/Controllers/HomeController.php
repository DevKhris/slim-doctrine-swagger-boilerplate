<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    /**
     * @OA\Get(
     *   path="/",
     *   summary="Get welcome message",
     *   @OA\Response(
     *     response=200,
     *     description="Get welcome message"
     *   )
     * )
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  RequestInterface
     * @param \Psr\Http\Message\ResponseInterface      $response ResponseInterface
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(Request $request, Response $response): Response
    {
        $response->getBody()->write("Welcome");
        return $response;
    }
}
