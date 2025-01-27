<?php

namespace App\Containers\ProductSection\ProductImage\UI\API\Controllers;

use App\Containers\ProductSection\ProductImage\Actions\DeleteProductImageAction;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\DeleteProductImageRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteProductImageController extends ApiController
{
    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteProductImageRequest $request, DeleteProductImageAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
