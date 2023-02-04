<?php

declare(strict_types=1);

namespace App\Repository\Backend;

use App\Contracts\TransactionRepositoryInterface;
use App\Enums\ReservationEnum;
use App\Models\Transaction;
use App\Services\FlashMessageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactions(): Collection|array
    {
        return Transaction::query()
            ->with([
                'client:id,name,phones_number',
                'reservation:id,status',
            ])
            ->whereHas('reservation', function ($builder) {
                $builder->where('status', ReservationEnum::CONFIRMED_RESERVATION);
            })
            ->get([
                'id',
                'client_id',
                'reservation_id',
                'payment_date',
                'code_transaction',
            ]);
    }

    public function showTransaction(int $key): Model|Builder
    {
        $transaction = Transaction::query()
            ->whereHas('reservation', function ($builder) {
                $builder->where('status', ReservationEnum::CONFIRMED_RESERVATION);
            })
            ->where('id', '=', $key)
            ->first();

        return $transaction->load([
            'client',
            'reservation',
            'reservation' => [
                'house',
            ],
        ]);
    }

    public function deleteTransaction(int $key): Model|Builder
    {
        $transaction = $this->showTransaction($key);
        $transaction->delete();
        return $transaction;
    }
}
