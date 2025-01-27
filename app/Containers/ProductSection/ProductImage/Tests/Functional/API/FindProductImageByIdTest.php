<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Functional\API;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class FindProductImageByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/product-images/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testFindProductImage(): void
    {
        $productImage = ProductImageFactory::new()->createOne();

        $response = $this->injectId($productImage->id)->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($productImage->id))
                    ->etc()
        );
    }

    public function testFindNonExistingProductImage(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    public function testFindFilteredProductImageResponse(): void
    {
        $productImage = ProductImageFactory::new()->createOne();

        $response = $this->injectId($productImage->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $productImage->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindProductImageWithRelation(): void
    // {
    //     $productImage = ProductImageFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($productImage->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $productImage->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
