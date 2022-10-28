<?php

declare(strict_types=1);

namespace App\Enums;

enum ToiletEnum: string
{
    const INTERNE = 'interne';

    const EXTERNE = 'externe';

    const INTERNE_EXTERNE = 'interne_externe';
}
