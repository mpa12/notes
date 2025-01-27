<?php

namespace App\Containers\ProductSection\ProductImage\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\ProductSection\ProductImage\Actions\UpdateProductImageAction;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\UpdateProductImageRequest;
use App\Containers\ProductSection\ProductImage\UI\API\Transformers\ProductImageTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateProductImageController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateProductImageRequest $request, UpdateProductImageAction $action): array
    {
        $productImage = $action->run($request);

        return $this->transform($productImage, ProductImageTransformer::class);
    }
}
