<?php

declare(strict_types=1);

namespace App\Contracts;

interface InvoiceRepositoryInterface
{
    public function download(int $key);
}
