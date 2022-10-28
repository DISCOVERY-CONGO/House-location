<?php

declare(strict_types=1);

namespace App\Traits;

trait HasRandomValue
{
    public function generateRandomTransaction(int $values): string
    {
        $characters = '0123456789#ABCDEFGHILKMNOPQRSTUVWXYZ#abcdefghilkmnopqrstuvwxyz';
        $randomString = '';
        for ($i = 0; $i < $values; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return strtoupper($randomString);
    }

    public function generateNumericValues(int $firstValue, int $secondValue): int
    {
        return rand($firstValue, $secondValue);
    }

    public function generateStringValues(int $firstValue, int $secondValue): string
    {
        return strval(rand($firstValue, $secondValue));
    }
}
