<?php

namespace App\Containers\ProductSection\Product\Data\Seeders;

use App\Containers\ProductSection\Product\Models\Product;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ProductSeeder_2 extends ParentSeeder
{
    public function run(): void
    {
        Product::factory()->count(50)->create();
    }
}
