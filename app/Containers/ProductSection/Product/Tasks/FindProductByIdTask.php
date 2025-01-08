<?php

namespace App\Containers\ProductSection\Product\Tasks;

use App\Containers\ProductSection\Product\Data\Repositories\ProductRepository;
use App\Containers\ProductSection\Product\Models\Product;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindProductByIdTask extends ParentTask
{
    public function __construct(
        private readonly ProductRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Product
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
