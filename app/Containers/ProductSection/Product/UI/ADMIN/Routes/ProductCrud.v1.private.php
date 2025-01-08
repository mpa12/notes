<?php

use App\Containers\ProductSection\Product\UI\ADMIN\Controllers\ProductCrudController;
use Illuminate\Support\Facades\Route;

Route::crud('product', ProductCrudController::class);
