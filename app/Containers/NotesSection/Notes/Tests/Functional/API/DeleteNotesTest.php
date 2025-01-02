<?php

namespace App\Containers\NotesSection\Notes\Tests\Functional\API;

use App\Containers\NotesSection\Notes\Data\Factories\NotesFactory;
use App\Containers\NotesSection\Notes\Tests\Functional\ApiTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class DeleteNotesTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/notes/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testDeleteExistingNotes(): void
    {
        $notes = NotesFactory::new()->createOne();

        $response = $this->injectId($notes->id)->makeCall();

        $response->assertNoContent();
    }

    public function testDeleteNonExistingNotes(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteNotes(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $notes = NotesFactory::new()->createOne();
    //
    //     $response = $this->injectId($notes->id)->makeCall();
    //
    //     $response->assertForbidden();
    // }
}
