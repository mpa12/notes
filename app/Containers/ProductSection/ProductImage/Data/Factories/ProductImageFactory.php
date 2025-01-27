<?php

namespace App\Containers\ProductSection\ProductImage\Data\Factories;

use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of ProductImage
 *
 * @extends ParentFactory<TModel>
 */
class ProductImageFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = ProductImage::class;

    public function definition(): array
    {
        return [];
    }
}
