<?php

declare(strict_types=1);

namespace App\Contracts;

interface ImageRepositoryInterface
{
    public function getContents();

    public function show(string $key);

    public function created($attributes);

    public function deleted(string $key);
}
