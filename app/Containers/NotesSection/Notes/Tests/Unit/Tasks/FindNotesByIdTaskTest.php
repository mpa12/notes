<?php

namespace App\Containers\NotesSection\Notes\Tests\Unit\Tasks;

use App\Containers\NotesSection\Notes\Data\Factories\NotesFactory;
use App\Containers\NotesSection\Notes\Tasks\FindNotesByIdTask;
use App\Containers\NotesSection\Notes\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindNotesByIdTask::class)]
class FindNotesByIdTaskTest extends UnitTestCase
{
    public function testFindNotesById(): void
    {
        $notes = NotesFactory::new()->createOne();

        $foundNotes = app(FindNotesByIdTask::class)->run($notes->id);

        $this->assertEquals($notes->id, $foundNotes->id);
    }
}
