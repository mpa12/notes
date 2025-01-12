<?php

namespace App\Containers\ProductSection\ProductCategory\Enums;

use App\Ship\Contracts\Readable;

enum ProductCategoryStatusEnum: int implements Readable
{
    case ACTIVE = 1;

    public function readable(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
        };
    }
}
