<?php

namespace App\Containers\ProductSection\Product\UI\WEB\Controllers;

use App\Containers\ProductSection\Product\Actions\FindProductByIdAction;
use App\Containers\ProductSection\Product\UI\WEB\Requests\FindProductByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindProductByIdController extends WebController
{
    public function show(FindProductByIdRequest $request)
    {
        $product = app(FindProductByIdAction::class)->run($request);
        // ...
    }
}
