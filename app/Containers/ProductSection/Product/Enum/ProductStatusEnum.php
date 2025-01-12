<?php

namespace App\Containers\ProductSection\Product\Enum;

use App\Ship\Contracts\Readable;

enum ProductStatusEnum: int implements Readable
{
    case ACTIVE = 1;

    public function readable(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
        };
    }
}
