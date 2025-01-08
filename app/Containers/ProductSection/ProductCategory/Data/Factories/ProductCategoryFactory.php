<?php

namespace App\Containers\ProductSection\ProductCategory\Data\Factories;

use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Ship\Parents\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

/**
 * @template TModel of ProductCategory
 *
 * @extends ParentFactory<TModel>
 */
class ProductCategoryFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        $name = fake()->name();
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->text(),
            'parent_id' => null,
            'image' => fake()->imageUrl(20, 20),
            'status' => fake()->randomElement([1]),
        ];
    }
}
