<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Contracts\InvoiceRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Http\Response;
use PDF;

class InvoiceUserController extends Controller
{
    public function __construct(protected readonly InvoiceRepositoryInterface $repository)
    {
    }

    public function downloadInvoice(InvoiceRequest $invoiceRequest): Response
    {
        $invoices = $this->repository->download($invoiceRequest);
        $pdf = PDF::loadView('testPDF', $invoices);
        $invoice = now().'_invoice.pdf';
        return $pdf->download("$invoice");
    }
}
