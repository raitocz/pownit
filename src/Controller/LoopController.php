<?php

declare(strict_types=1);

namespace Raito\Pownit\Controller;

use League\Plates\Engine;
use Raito\Pownit\Loop;
use Raito\Pownit\Metadata;

class LoopController implements Controller
{
    private Engine $templateEngine;
    private Loop $loop;
    private Metadata $loopMetadata;

    public function __construct(Engine $templateEngine)
    {
        $this->templateEngine = $templateEngine;
        $this->loop = new Loop();
        $this->loopMetadata = Metadata::load($this->loop->getCurrentId());
    }

    public function renderHtml(): string
    {
        $data = [
            'currentId' => $this->loop->getCurrentId(),
            'nextId' => $this->loop->getNextId(),
            'prevId' => $this->loop->getPrevId(),
            'randomId' => $this->loop->getRandomId(),
            'views' => $this->loopMetadata->increaseViewCountAndGetCurrent(),
            'fileExistsForId' => $this->loop->fileExistsForId($this->loop->getCurrentId())
        ];

        return $this->templateEngine->render('LoopTemplate', $data);
    }
}