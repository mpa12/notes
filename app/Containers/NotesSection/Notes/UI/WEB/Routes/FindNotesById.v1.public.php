<?php

use App\Containers\NotesSection\Notes\UI\WEB\Controllers\FindNotesByIdController;
use Illuminate\Support\Facades\Route;

Route::get('notes/{id}', [FindNotesByIdController::class, 'show']);

