<?php

use App\Containers\HomeSection\Home\UI\WEB\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

