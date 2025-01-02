<?php

namespace App\Containers\NotesSection\Notes\Data\Repositories;

use App\Containers\NotesSection\Notes\Models\Notes;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Notes
 *
 * @extends ParentRepository<TModel>
 */
class NotesRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
