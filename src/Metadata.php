<?php

declare(strict_types=1);

namespace Raito\Pownit;

final class Metadata
{
    public const METADATA_DIR = "assets/data";

    private function __construct(private readonly int $id, private float $views)
    {
    }

    public static function load(int $id): self
    {
        if(file_exists(self::getFileLocationAndName($id)))
        {
            $data = json_decode(file_get_contents(self::getFileLocationAndName($id)), true, 512, JSON_THROW_ON_ERROR);
            return new self($id, $data['views']);
        }

        return new self($id, 0);
    }

    public function increaseViewCountAndGetCurrent(): float
    {
        $this->views++;
        $this->save();

        return $this->views;
    }

    public function save(): void
    {
        $data = [
            'id' => $this->id,
            'views' => $this->views
        ];

        file_put_contents(self::getFileLocationAndName($this->id), json_encode($data, JSON_THROW_ON_ERROR));
    }

    public static function getFileLocationAndName(int $id): string
    {
        return sprintf('%s/%s.json', self::METADATA_DIR, $id);
    }
}