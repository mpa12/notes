<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Tasks;

use App\Containers\ProductSection\ProductImage\Tasks\CreateProductImageTask;
use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateProductImageTask::class)]
class CreateProductImageTaskTest extends UnitTestCase
{
    public function testCreateProductImage(): void
    {
        $data = [];

        $productImage = app(CreateProductImageTask::class)->run($data);

        $this->assertModelExists($productImage);
    }
}
