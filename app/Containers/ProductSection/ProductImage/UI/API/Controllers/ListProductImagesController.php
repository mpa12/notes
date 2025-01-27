<?php

namespace App\Containers\ProductSection\ProductImage\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\ProductSection\ProductImage\Actions\ListProductImagesAction;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\ListProductImagesRequest;
use App\Containers\ProductSection\ProductImage\UI\API\Transformers\ProductImageTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListProductImagesController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListProductImagesRequest $request, ListProductImagesAction $action): array
    {
        $productImages = $action->run($request);

        return $this->transform($productImages, ProductImageTransformer::class);
    }
}
