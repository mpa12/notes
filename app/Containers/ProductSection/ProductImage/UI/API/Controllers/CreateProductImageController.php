<?php

namespace App\Containers\ProductSection\ProductImage\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\ProductSection\ProductImage\Actions\CreateProductImageAction;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\CreateProductImageRequest;
use App\Containers\ProductSection\ProductImage\UI\API\Transformers\ProductImageTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateProductImageController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateProductImageRequest $request, CreateProductImageAction $action): JsonResponse
    {
        $productImage = $action->run($request);

        return $this->created($this->transform($productImage, ProductImageTransformer::class));
    }
}
