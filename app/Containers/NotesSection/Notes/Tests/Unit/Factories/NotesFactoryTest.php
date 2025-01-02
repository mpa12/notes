<?php

namespace App\Containers\NotesSection\Notes\Tests\Unit\Factories;

use App\Containers\NotesSection\Notes\Data\Factories\NotesFactory;
use App\Containers\NotesSection\Notes\Models\Notes;
use App\Containers\NotesSection\Notes\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(NotesFactory::class)]
class NotesFactoryTest extends UnitTestCase
{
    public function testCreateNotes(): void
    {
        $notes = NotesFactory::new()->make();

        $this->assertInstanceOf(Notes::class, $notes);
    }
}
