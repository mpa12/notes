<?php

namespace App\Containers\ProductSection\Product\Actions;

use App\Containers\ProductSection\Product\Models\Product;
use App\Containers\ProductSection\Product\Tasks\FindProductByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindProductByIdTask $findProductByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($request): Product
    {
        return $this->findProductByIdTask->run($request->id);
    }
}
