<?php

namespace App\Containers\ProductSection\ProductImage\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ProductSection\ProductImage\Data\Repositories\ProductImageRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListProductImagesTask extends ParentTask
{
    public function __construct(
        private readonly ProductImageRepository $repository,
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
