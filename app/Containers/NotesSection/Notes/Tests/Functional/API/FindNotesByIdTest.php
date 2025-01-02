<?php

namespace App\Containers\NotesSection\Notes\Tests\Functional\API;

use App\Containers\NotesSection\Notes\Data\Factories\NotesFactory;
use App\Containers\NotesSection\Notes\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class FindNotesByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/notes/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testFindNotes(): void
    {
        $notes = NotesFactory::new()->createOne();

        $response = $this->injectId($notes->id)->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($notes->id))
                    ->etc()
        );
    }

    public function testFindNonExistingNotes(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    public function testFindFilteredNotesResponse(): void
    {
        $notes = NotesFactory::new()->createOne();

        $response = $this->injectId($notes->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $notes->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindNotesWithRelation(): void
    // {
    //     $notes = NotesFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($notes->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $notes->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
