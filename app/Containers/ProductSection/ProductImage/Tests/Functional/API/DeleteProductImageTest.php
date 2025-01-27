<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Functional\API;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tests\Functional\ApiTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class DeleteProductImageTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/product-images/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testDeleteExistingProductImage(): void
    {
        $productImage = ProductImageFactory::new()->createOne();

        $response = $this->injectId($productImage->id)->makeCall();

        $response->assertNoContent();
    }

    public function testDeleteNonExistingProductImage(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteProductImage(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $productImage = ProductImageFactory::new()->createOne();
    //
    //     $response = $this->injectId($productImage->id)->makeCall();
    //
    //     $response->assertForbidden();
    // }
}
