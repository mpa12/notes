<?php

use App\Containers\ProductSection\Catalog\UI\WEB\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('catalog', [CatalogController::class, 'index'])->name('web.catalog');

