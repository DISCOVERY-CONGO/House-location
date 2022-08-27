<?php

declare(strict_types=1);

namespace App\Contracts;

interface TransactionRepositoryInterface
{
    public function getTransactions();

    public function showTransaction(int $key);

    public function deleteTransaction(int $key);
}
