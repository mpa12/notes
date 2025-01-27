<?php

namespace App\Containers\ProductSection\ProductImage\Actions;

use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Containers\ProductSection\ProductImage\Tasks\FindProductImageByIdTask;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\FindProductImageByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductImageByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindProductImageByIdTask $findProductImageByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindProductImageByIdRequest $request): ProductImage
    {
        return $this->findProductImageByIdTask->run($request->id);
    }
}
