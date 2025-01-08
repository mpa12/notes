<?php

use App\Containers\ProductSection\Product\UI\WEB\Controllers\FindProductByIdController;
use Illuminate\Support\Facades\Route;

Route::get('products/{id}', [FindProductByIdController::class, 'show']);

