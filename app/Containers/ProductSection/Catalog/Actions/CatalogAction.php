<?php

namespace App\Containers\ProductSection\Catalog\Actions;

use App\Containers\ProductSection\Catalog\UI\WEB\Requests\CatalogRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class CatalogAction extends ParentAction
{
    public function run(CatalogRequest $request): mixed
    {
        return view('productSection@catalog::catalog');
    }
}
