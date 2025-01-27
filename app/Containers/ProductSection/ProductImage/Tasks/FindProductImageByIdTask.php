<?php

namespace App\Containers\ProductSection\ProductImage\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Repositories\ProductImageRepository;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindProductImageByIdTask extends ParentTask
{
    public function __construct(
        private readonly ProductImageRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ProductImage
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
