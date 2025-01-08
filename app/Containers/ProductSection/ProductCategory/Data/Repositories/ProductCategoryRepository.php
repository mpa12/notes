<?php

namespace App\Containers\ProductSection\ProductCategory\Data\Repositories;

use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of ProductCategory
 *
 * @extends ParentRepository<TModel>
 */
class ProductCategoryRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
