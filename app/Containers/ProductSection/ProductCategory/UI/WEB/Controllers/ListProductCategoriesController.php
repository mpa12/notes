<?php

namespace App\Containers\ProductSection\ProductCategory\UI\WEB\Controllers;

use App\Containers\ProductSection\ProductCategory\Actions\ListProductCategoriesAction;
use App\Containers\ProductSection\ProductCategory\UI\WEB\Requests\ListProductCategoriesRequest;
use App\Ship\Parents\Controllers\WebController;

class ListProductCategoriesController extends WebController
{
    public function index(ListProductCategoriesRequest $request)
    {
        $productCategories = app(ListProductCategoriesAction::class)->run($request);
        // ...
    }
}
