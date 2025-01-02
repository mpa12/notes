<?php

namespace App\Containers\NotesSection\Notes\Actions;

use App\Containers\NotesSection\Notes\Models\Notes;
use App\Containers\NotesSection\Notes\Tasks\FindNotesByIdTask;
use App\Containers\NotesSection\Notes\UI\WEB\Requests\FindNotesByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindNotesByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindNotesByIdTask $findNotesByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindNotesByIdRequest $request): Notes
    {
        return $this->findNotesByIdTask->run($request->id);
    }
}
