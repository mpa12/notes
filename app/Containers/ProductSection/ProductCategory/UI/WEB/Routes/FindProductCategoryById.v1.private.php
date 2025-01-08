<?php

use App\Containers\ProductSection\ProductCategory\UI\WEB\Controllers\FindProductCategoryByIdController;
use Illuminate\Support\Facades\Route;

Route::get('product-categories/{id}', [FindProductCategoryByIdController::class, 'show'])
    ->middleware(['auth:web']);

