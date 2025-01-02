<?php

namespace App\Containers\NotesSection\Notes\Tests\Functional\API;

use App\Containers\NotesSection\Notes\Data\Factories\NotesFactory;
use App\Containers\NotesSection\Notes\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class ListNotesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/notes';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testListNotesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        NotesFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertOk();
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListNotesByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     NotesFactory::new()->count(2)->create();
    //
    //     $response = $this->makeCall();
    //
    //     $response->assertForbidden();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('message')
    //                 ->where('message', 'This action is unauthorized.')
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchNotesByFields(): void
    // {
    //     NotesFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $notes = NotesFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($notes->name))->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $notes->name)
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchNotesByHashID(): void
    // {
    //     $notes = NotesFactory::new()->count(3)->create();
    //     $secondNotes = $notes[1];
    //
    //     $response = $this->endpoint($this->endpoint . '?search=id:' . $secondNotes->getHashedKey())->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                  ->where('data.0.id', $secondNotes->getHashedKey())
    //                 ->etc()
    //     );
    // }
}
