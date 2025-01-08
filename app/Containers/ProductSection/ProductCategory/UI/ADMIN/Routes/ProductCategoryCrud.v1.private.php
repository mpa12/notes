<?php

use App\Containers\ProductSection\ProductCategory\UI\ADMIN\Controllers\ProductCategoryCrudController;
use Illuminate\Support\Facades\Route;

Route::crud('product-category', ProductCategoryCrudController::class);
