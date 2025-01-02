<?php

namespace App\Containers\NotesSection\Notes\Tests\Unit\Tasks;

use App\Containers\NotesSection\Notes\Data\Factories\NotesFactory;
use App\Containers\NotesSection\Notes\Tasks\ListNotesTask;
use App\Containers\NotesSection\Notes\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListNotesTask::class)]
class ListNotesTaskTest extends UnitTestCase
{
    public function testListNotes(): void
    {
        NotesFactory::new()->count(3)->create();

        $foundNotes = app(ListNotesTask::class)->run();

        $this->assertCount(3, $foundNotes);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundNotes);
    }
}
