<?php

namespace App\Containers\NotesSection\Notes\UI\WEB\Controllers;

use App\Containers\NotesSection\Notes\Actions\ListNotesAction;
use App\Containers\NotesSection\Notes\UI\WEB\Requests\ListNotesRequest;
use App\Ship\Parents\Controllers\WebController;

class ListNotesController extends WebController
{
    public function index(ListNotesRequest $request)
    {
        $notes = app(ListNotesAction::class)->run($request);
        dd($notes);
    }
}
