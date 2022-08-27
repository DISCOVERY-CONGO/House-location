<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Contracts\InvoiceRepositoryInterface;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Reservation_QB;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function download($invoiceRequest): Model|Builder|Reservation|_IH_Reservation_QB
    {
        $invoice =  Reservation::query()
            ->select([
                'client_id',
                'user_id',
                'house_id',
                'messages',
                'id'
            ])
            ->where('id', '=', $invoiceRequest->input("id"))
            ->firstOrFail();

        return $invoice->load([
            'house',
            'client',
            'transaction'
        ]);
    }
}
