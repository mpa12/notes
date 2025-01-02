<?php

namespace App\Containers\NotesSection\Notes\Tasks;

use App\Containers\NotesSection\Notes\Data\Repositories\NotesRepository;
use App\Containers\NotesSection\Notes\Models\Notes;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindNotesByIdTask extends ParentTask
{
    public function __construct(
        private readonly NotesRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Notes
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
