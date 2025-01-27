<?php

namespace App\Containers\ProductSection\ProductImage\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ProductSection\ProductImage\Tasks\ListProductImagesTask;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\ListProductImagesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListProductImagesAction extends ParentAction
{
    public function __construct(
        private readonly ListProductImagesTask $listProductImagesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListProductImagesRequest $request): mixed
    {
        return $this->listProductImagesTask->run();
    }
}
