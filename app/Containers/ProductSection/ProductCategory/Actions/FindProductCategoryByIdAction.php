<?php

namespace App\Containers\ProductSection\ProductCategory\Actions;

use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Containers\ProductSection\ProductCategory\Tasks\FindProductCategoryByIdTask;
use App\Containers\ProductSection\ProductCategory\UI\WEB\Requests\FindProductCategoryByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductCategoryByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindProductCategoryByIdTask $findProductCategoryByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindProductCategoryByIdRequest $request): ProductCategory
    {
        return $this->findProductCategoryByIdTask->run($request->id);
    }
}
