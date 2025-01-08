<?php

namespace App\Containers\ProductSection\ProductCategory\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ProductSection\ProductCategory\Tasks\ListProductCategoriesTask;
use App\Containers\ProductSection\ProductCategory\UI\WEB\Requests\ListProductCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListProductCategoriesAction extends ParentAction
{
    public function __construct(
        private readonly ListProductCategoriesTask $listProductCategoriesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListProductCategoriesRequest $request): mixed
    {
        return $this->listProductCategoriesTask->run();
    }
}
