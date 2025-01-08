<?php

use App\Containers\ProductSection\Product\UI\WEB\Controllers\ListProductsController;
use Illuminate\Support\Facades\Route;

Route::get('products', [ListProductsController::class, 'index']);

