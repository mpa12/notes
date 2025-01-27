<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tasks\UpdateProductImageTask;
use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdateProductImageTask::class)]
class UpdateProductImageTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateProductImage(): void
    {
        $productImage = ProductImageFactory::new()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $updatedProductImage = app(UpdateProductImageTask::class)->run($data, $productImage->id);

        $this->assertEquals($productImage->id, $updatedProductImage->id);
        // $this->assertEquals($data['some_field'], $updatedProductImage->some_field);
    }
}
