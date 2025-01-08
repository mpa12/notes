<?php

use App\Containers\ProductSection\ProductCategory\UI\WEB\Controllers\ListProductCategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('product-categories', [ListProductCategoriesController::class, 'index'])
    ->middleware(['auth:web']);

