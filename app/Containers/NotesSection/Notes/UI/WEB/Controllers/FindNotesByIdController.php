<?php

namespace App\Containers\NotesSection\Notes\UI\WEB\Controllers;

use App\Containers\NotesSection\Notes\Actions\FindNotesByIdAction;
use App\Containers\NotesSection\Notes\UI\WEB\Requests\FindNotesByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindNotesByIdController extends WebController
{
    public function show(FindNotesByIdRequest $request)
    {
        $notes = app(FindNotesByIdAction::class)->run($request);
        dd($notes);
    }
}
