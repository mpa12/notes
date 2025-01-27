<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Factories;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ProductImageFactory::class)]
class ProductImageFactoryTest extends UnitTestCase
{
    public function testCreateProductImage(): void
    {
        $productImage = ProductImageFactory::new()->make();

        $this->assertInstanceOf(ProductImage::class, $productImage);
    }
}
