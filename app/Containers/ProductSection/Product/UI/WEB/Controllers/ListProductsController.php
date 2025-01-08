<?php

namespace App\Containers\ProductSection\Product\UI\WEB\Controllers;

use App\Containers\ProductSection\Product\Actions\ListProductsAction;
use App\Containers\ProductSection\Product\UI\WEB\Requests\ListProductsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListProductsController extends WebController
{
    public function index(ListProductsRequest $request)
    {
        $products = app(ListProductsAction::class)->run($request);
        // ...
    }
}
