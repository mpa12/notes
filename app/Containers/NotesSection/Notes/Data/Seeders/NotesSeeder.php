<?php

namespace App\Containers\NotesSection\Notes\Data\Seeders;

use App\Containers\NotesSection\Notes\Models\Notes;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class NotesSeeder extends ParentSeeder
{
    public function run(): void
    {
        Notes::factory()->count(50)->create();
    }
}
