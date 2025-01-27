<?php

namespace App\Containers\ProductSection\ProductImage\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Containers\ProductSection\ProductImage\Tasks\CreateProductImageTask;
use App\Containers\ProductSection\ProductImage\UI\API\Requests\CreateProductImageRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductImageAction extends ParentAction
{
    public function __construct(
        private readonly CreateProductImageTask $createProductImageTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateProductImageRequest $request): ProductImage
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createProductImageTask->run($data);
    }
}
