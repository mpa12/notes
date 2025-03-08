<?php

namespace App\Containers\ProductSection\Catalog\UI\WEB\Controllers;

use App\Containers\ProductSection\Catalog\Actions\CatalogAction;
use App\Containers\ProductSection\Catalog\UI\WEB\Requests\CatalogRequest;
use App\Ship\Parents\Controllers\WebController;

class CatalogController extends WebController
{
    public function index(CatalogRequest $request)
    {
        return app(CatalogAction::class)->run($request);
    }
}
