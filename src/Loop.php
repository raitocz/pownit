<?php

declare(strict_types=1);

namespace Raito\Pownit;

final class Loop
{
    private const VID_PATH = 'assets/vid/';
    private const VID_EXT = '.swf';
    private const PARAM_ID = 'id';
    private const MIN_ID = 1;
    private const MAX_ID = 5382;

    private int $id;

    public function __construct()
    {
        $id = $this->getRequestedId() ?? $this->getRandomId();
        $this->id = min($id, $this->getMaxId());
    }

    public function getRandomId(): int
    {
        return random_int(self::MIN_ID, $this->getMaxId());
    }

    public function getCurrentId(): int
    {
        return $this->id;
    }

    public function getNextId(): ?int
    {
        $nextId = $this->getCurrentId() + 1;

        return ($nextId > $this->getMaxId() ? null : $nextId);
    }

    public function getPrevId(): ?int
    {
        $prevId = $this->getCurrentId() - 1;

        return ($prevId < self::MIN_ID ? null : $prevId);
    }

    public function getRequestedId(): ?int
    {
        $id = (int) filter_input(INPUT_GET, self::PARAM_ID);

        return $id === 0 ? null : $id;
    }

    public function fileExistsForId(int $id): bool
    {
        return file_exists(sprintf('%s%s%s', self::VID_PATH, $id, self::VID_EXT));
    }

    public function getMaxId(): int
    {
        return self::MAX_ID;
    }
}