<?php

namespace App\Containers\ProductSection\ProductImage\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Containers\ProductSection\ProductImage\Tasks\UpdateProductImageTask;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\UpdateProductImageRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateProductImageAction extends ParentAction
{
    public function __construct(
        private readonly UpdateProductImageTask $updateProductImageTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateProductImageRequest $request): ProductImage
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateProductImageTask->run($data, $request->id);
    }
}
