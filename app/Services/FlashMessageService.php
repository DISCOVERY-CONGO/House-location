<?php

declare(strict_types=1);

namespace App\Services;

use RealRashid\SweetAlert\Facades\Alert;

class FlashMessageService
{
    public function __construct(
        public Alert $factory
    ) {
    }

    public function success(string $type, string $messages): void
    {
        $this->factory::success(
            title: $type,
            text: $messages
        );
    }

    public function danger(string $type, string $messages): void
    {
        $this->factory::error(
            title: $type,
            text: $messages
        );
    }

    public function warning(string $type, string $messages): void
    {
        $this->factory::warning(
            title: $type,
            text: $messages
        );
    }

    public function info(string $type, string $messages): void
    {
        $this->factory::info(
            title: $type,
            text: $messages
        );
    }
}
