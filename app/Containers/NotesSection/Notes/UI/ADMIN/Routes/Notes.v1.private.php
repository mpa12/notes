<?php

use App\Containers\NotesSection\Notes\UI\ADMIN\Controllers\Admin\NotesCrudController;
use Illuminate\Support\Facades\Route;

Route::crud('notes', NotesCrudController::class);
