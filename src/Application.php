<?php

declare(strict_types=1);

namespace Raito\Pownit;

use League\Plates\Engine;

final class Application
{
    public const PARAM_ACTION = 'action';
    public const TEMPLATES_DIRECTORY = 'src/templates/';

    private Router $router;

    public function __construct()
    {
        $this->router = new Router($this->getTemplateEngine());
    }
    public function run(): void
    {
        $controller = $this->getRouter()->getControllerForRoute($this->getRoutePath());

        echo($controller->renderHtml());
    }

    private function getTemplateEngine(): Engine
    {
        return new Engine(self::TEMPLATES_DIRECTORY);
    }

    private function getRouter(): Router
    {
        return $this->router;
    }

    private function getRoutePath(): string
    {
        return filter_input(INPUT_GET, self::PARAM_ACTION);
    }
}