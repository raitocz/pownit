<?php

declare(strict_types=1);

namespace Raito\Pownit\Controller;

use League\Plates\Engine;

class ErrorController implements Controller
{
    public function __construct(private Engine $templateEngine, private ?string $message = null, private int $code = 500)
    {
        $this->templateEngine = $templateEngine;
    }

    public function renderHtml(): string
    {
        return $this->templateEngine->render('ErrorTemplate', ["message" => $this->message, "code" => $this->code]);
    }
}