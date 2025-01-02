<?php

namespace App\Containers\NotesSection\Notes\Tests\Unit\Data\Migrations;

use App\Containers\NotesSection\Notes\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class NotesMigrationTest extends UnitTestCase
{
    public function testNotesTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'bigint',
            'name' => 'varchar',
            'slug' => 'varchar',
            'description' => 'text',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

        $this->assertDatabaseTable('notes', $columns);
    }
}
