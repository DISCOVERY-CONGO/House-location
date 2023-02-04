<?php

declare(strict_types=1);

namespace App\Enums;

use JessArcher\CastableDataTransferObject\CastableDataTransferObject;

class Address extends CastableDataTransferObject
{
    public ?string $town;
    public ?string $commune;
    public ?string $district;
    public ?string $address;


    public function formatString(): string
    {
        return implode(', ', [
            $this->town,
            $this->commune,
            $this->district,
            $this->address
        ]);
    }
}
