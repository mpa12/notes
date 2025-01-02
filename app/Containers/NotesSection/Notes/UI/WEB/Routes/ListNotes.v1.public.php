<?php

use App\Containers\NotesSection\Notes\UI\WEB\Controllers\ListNotesController;
use Illuminate\Support\Facades\Route;

Route::get('notes', [ListNotesController::class, 'index']);

