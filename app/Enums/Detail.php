<?php

declare(strict_types=1);

namespace App\Enums;

use JessArcher\CastableDataTransferObject\CastableDataTransferObject;

class Detail extends CastableDataTransferObject
{
    public ?string $number_rooms;

    public ?string $number_pieces;

    public ?string $toilet;

    public ?string $electricity;

    public ?string $description;

    public function formatString(): string
    {
        return implode(', ', [
            $this->number_rooms,
            $this->number_pieces,
            $this->toilet,
            $this->electricity,
            $this->description,
        ]);
    }
}
