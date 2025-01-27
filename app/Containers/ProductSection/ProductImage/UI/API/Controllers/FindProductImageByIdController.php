<?php

namespace App\Containers\ProductSection\ProductImage\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\ProductSection\ProductImage\Actions\FindProductImageByIdAction;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\FindProductImageByIdRequest;
use App\Containers\ProductSection\ProductImage\UI\API\Transformers\ProductImageTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindProductImageByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindProductImageByIdRequest $request, FindProductImageByIdAction $action): array
    {
        $productImage = $action->run($request);

        return $this->transform($productImage, ProductImageTransformer::class);
    }
}
