<?php

namespace App\Containers\ProductSection\ProductImage\Tests\Unit\Data\Migrations;

use App\Containers\ProductSection\ProductImage\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class ProductImagesMigrationTest extends UnitTestCase
{
    public function testProductImagesTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'bigint',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

        $this->assertDatabaseTable('product_images', $columns);
    }
}
