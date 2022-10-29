<?php

declare(strict_types=1);

namespace App\Repository\Frontend;

use App\Contracts\NewsLetterRepositoryInterface;

class NewsLetterRepository implements NewsLetterRepositoryInterface
{
    public function send($request)
    {
        if (! (new \Spatie\Newsletter\Newsletter())->isSubscribed($request->email)) {
            (new \Spatie\Newsletter\Newsletter())->subscribePending($request->email);

            return back();
        }
    }
}
