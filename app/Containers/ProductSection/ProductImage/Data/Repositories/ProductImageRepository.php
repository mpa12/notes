<?php

namespace App\Containers\ProductSection\ProductImage\Data\Repositories;

use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of ProductImage
 *
 * @extends ParentRepository<TModel>
 */
class ProductImageRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
