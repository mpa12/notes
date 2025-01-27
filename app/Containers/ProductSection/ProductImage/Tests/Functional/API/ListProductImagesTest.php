<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Functional\API;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class ListProductImagesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/product-images';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testListProductImagesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        ProductImageFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertOk();
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListProductImagesByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     ProductImageFactory::new()->count(2)->create();
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
    // public function testSearchProductImagesByFields(): void
    // {
    //     ProductImageFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $productImage = ProductImageFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($productImage->name))->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $productImage->name)
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchProductImagesByHashID(): void
    // {
    //     $productimages = ProductImageFactory::new()->count(3)->create();
    //     $secondProductImage = $productimages[1];
    //
    //     $response = $this->endpoint($this->endpoint . '?search=id:' . $secondProductImage->getHashedKey())->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                  ->where('data.0.id', $secondProductImage->getHashedKey())
    //                 ->etc()
    //     );
    // }
}
