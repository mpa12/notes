<?php

namespace App\Containers\NotesSection\Notes\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\NotesSection\Notes\Tasks\ListNotesTask;
use App\Containers\NotesSection\Notes\UI\WEB\Requests\ListNotesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNotesAction extends ParentAction
{
    public function __construct(
        private readonly ListNotesTask $listNotesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListNotesRequest $request): mixed
    {
        return $this->listNotesTask->run();
    }
}
