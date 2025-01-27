<?php

namespace App\Containers\ProductSection\ProductImage\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Repositories\ProductImageRepository;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateProductImageTask extends ParentTask
{
    public function __construct(
        private readonly ProductImageRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ProductImage
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
