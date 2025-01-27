<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Tasks;

use App\Containers\ProductSection\ProductImage\Data\Factories\ProductImageFactory;
use App\Containers\ProductSection\ProductImage\Tasks\ListProductImagesTask;
use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListProductImagesTask::class)]
class ListProductImagesTaskTest extends UnitTestCase
{
    public function testListProductImages(): void
    {
        ProductImageFactory::new()->count(3)->create();

        $foundProductImages = app(ListProductImagesTask::class)->run();

        $this->assertCount(3, $foundProductImages);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundProductImages);
    }
}
