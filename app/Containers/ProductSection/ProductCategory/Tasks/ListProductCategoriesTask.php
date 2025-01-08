<?php

namespace App\Containers\ProductSection\ProductCategory\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ProductSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListProductCategoriesTask extends ParentTask
{
    public function __construct(
        private readonly ProductCategoryRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
