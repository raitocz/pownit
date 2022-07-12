<?php

declare(strict_types=1);

namespace Raito\Pownit\Controller;

interface Controller
{
    public function renderHtml(): string;
}