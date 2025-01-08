<?php

namespace App\Containers\ProductSection\ProductCategory\UI\WEB\Controllers;

use App\Containers\ProductSection\ProductCategory\Actions\FindProductCategoryByIdAction;
use App\Containers\ProductSection\ProductCategory\UI\WEB\Requests\FindProductCategoryByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindProductCategoryByIdController extends WebController
{
    public function show(FindProductCategoryByIdRequest $request)
    {
        $productCategory = app(FindProductCategoryByIdAction::class)->run($request);
        // ...
    }
}
