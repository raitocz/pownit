<?php

declare(strict_types=1);

namespace Raito\Pownit;

use League\Plates\Engine;
use Raito\Pownit\Controller\Controller;
use Raito\Pownit\Controller\LoopController;
use Raito\Pownit\Controller\ErrorController;

final class Router
{
    private const ROUTES = [
         self::ROUTE_LOOP,
    ];

    private const ROUTE_LOOP = 'loop';

    public function __construct(private Engine $templateEngine)
    {
    }

    public function getControllerForRoute(string $path): Controller
    {
        return $this->matchPathToController($path);
    }

    private function matchPathToController(string $path): Controller
    {
        return match ($path){
            self::ROUTE_LOOP => new LoopController($this->templateEngine),
            default => new ErrorController($this->templateEngine, "Requested URL not found.", 404),
        };
    }
}