<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public $contact)
    {
    }

    public function build(): ContactMail
    {
        return $this
            ->subject('')
            ->view('view.name', [
                'contacts' => $this->contact,
            ]);
    }
}
