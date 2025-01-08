<?php

namespace App\Containers\ProductSection\Product\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ProductSection\Product\Tasks\ListProductsTask;
use App\Containers\ProductSection\Product\UI\WEB\Requests\ListProductsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListProductsAction extends ParentAction
{
    public function __construct(
        private readonly ListProductsTask $listProductsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListProductsRequest $request): mixed
    {
        return $this->listProductsTask->run();
    }
}
