<?php

namespace App\Containers\NotesSection\Notes\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends ParentModel
{
    use SoftDeletes, CrudTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
