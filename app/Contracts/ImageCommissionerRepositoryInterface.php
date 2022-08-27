<?php

declare(strict_types=1);

namespace App\Contracts;

interface ImageCommissionerRepositoryInterface
{
    public function getImages();

    public function show(string $key);

    public function created($attributes);

    public function updated(string $key, $attributes);

    public function deleted(string $key);
}
