<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationCancelEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public  $reservation)
    {
        //
    }

    public function build(): ReservationCancelEmail
    {
        return $this
            ->from(env('MAIL_FROM_ADDRESS'), 'Example')
            ->view('frontend.domain.email.reservation', [
                'reservation' => $this->reservation
            ]);
    }
}
