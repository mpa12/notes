<?php

use App\Containers\AppSection\User\UI\ADMIN\Controllers\UserCrudController;
use Illuminate\Support\Facades\Route;

Route::crud('user', UserCrudController::class);
