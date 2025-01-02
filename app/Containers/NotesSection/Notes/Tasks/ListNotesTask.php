<?php

namespace App\Containers\NotesSection\Notes\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\NotesSection\Notes\Data\Repositories\NotesRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListNotesTask extends ParentTask
{
    public function __construct(
        private readonly NotesRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
