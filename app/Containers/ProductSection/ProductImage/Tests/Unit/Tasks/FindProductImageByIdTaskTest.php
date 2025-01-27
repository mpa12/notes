<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tasks\FindProductImageByIdTask;
use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindProductImageByIdTask::class)]
class FindProductImageByIdTaskTest extends UnitTestCase
{
    public function testFindProductImageById(): void
    {
        $productImage = ProductImageFactory::new()->createOne();

        $foundProductImage = app(FindProductImageByIdTask::class)->run($productImage->id);

        $this->assertEquals($productImage->id, $foundProductImage->id);
    }
}
