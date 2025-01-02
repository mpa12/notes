<?php

namespace App\Containers\NotesSection\Notes\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends ParentModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}
