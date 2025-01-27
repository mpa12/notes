<?php

namespace App\Containers\ProductSection\ProductImage\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Repositories\ProductImageRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteProductImageTask extends ParentTask
{
    public function __construct(
        private readonly ProductImageRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
