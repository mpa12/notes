<?php

namespace App\Containers\ProductSection\ProductCategory\Data\Seeders;

use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ProductCategorySeeder_1 extends ParentSeeder
{
    public function run(): void
    {
        ProductCategory::factory()->count(5)->create();
    }
}
