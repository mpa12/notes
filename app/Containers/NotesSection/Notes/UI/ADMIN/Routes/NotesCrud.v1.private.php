<?php

use App\Containers\NotesSection\Notes\UI\ADMIN\Controllers\NotesCrudController;
use Illuminate\Support\Facades\Route;

Route::crud('notes', NotesCrudController::class);
