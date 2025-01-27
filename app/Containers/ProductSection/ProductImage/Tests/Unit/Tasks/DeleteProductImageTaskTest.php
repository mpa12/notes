<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tasks\DeleteProductImageTask;
use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeleteProductImageTask::class)]
class DeleteProductImageTaskTest extends UnitTestCase
{
    public function testDeleteProductImage(): void
    {
        $productImage = ProductImageFactory::new()->createOne();

        $result = app(DeleteProductImageTask::class)->run($productImage->id);

        $this->assertEquals(1, $result);
    }
}
