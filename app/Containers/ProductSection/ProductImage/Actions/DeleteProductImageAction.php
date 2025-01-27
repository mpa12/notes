<?php

namespace App\Containers\ProductSection\ProductImage\Actions;

use App\Containers\ProductSection\ProductImage\Tasks\DeleteProductImageTask;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\DeleteProductImageRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteProductImageAction extends ParentAction
{
    public function __construct(
        private readonly DeleteProductImageTask $deleteProductImageTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteProductImageRequest $request): int
    {
        return $this->deleteProductImageTask->run($request->id);
    }
}
