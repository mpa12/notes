<?php

namespace App\Containers\ProductSection\ProductImage\UI\API\Transformers;

use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ProductImageTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(ProductImage $productimage): array
    {
        return [
            'object' => $productimage->getResourceKey(),
            'id' => $productimage->getHashedKey(),
            'created_at' => $productimage->created_at,
            'updated_at' => $productimage->updated_at,
            'readable_created_at' => $productimage->created_at->diffForHumans(),
            'readable_updated_at' => $productimage->updated_at->diffForHumans(),
        ];
    }
}
