<?php

namespace App\Containers\ProductSection\ProductCategory\Tasks;

use App\Containers\ProductSection\ProductCategory\Data\Repositories\ProductCategoryRepository;
use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindProductCategoryByIdTask extends ParentTask
{
    public function __construct(
        private readonly ProductCategoryRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ProductCategory
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
