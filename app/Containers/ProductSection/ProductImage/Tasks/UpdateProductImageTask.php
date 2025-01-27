<?php

namespace App\Containers\ProductSection\ProductImage\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Repositories\ProductImageRepository;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateProductImageTask extends ParentTask
{
    public function __construct(
        private readonly ProductImageRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ProductImage
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
