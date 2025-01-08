<?php

namespace App\Containers\ProductSection\Product\Data\Factories;

use App\Containers\ProductSection\Product\Models\Product;
use App\Ship\Parents\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

/**
 * @template TModel of Product
 *
 * @extends ParentFactory<TModel>
 */
class ProductFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->name();
        $slug = Str::slug($name);

        $price = fake()->randomFloat(2, 100, 5_000);
        $old_price = $price * fake()->randomFloat(2, 0.1, 0.9);

        return [
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->text(1000),
            'short_description' => fake()->text(),
            'price' => $price,
            'old_price' => fake()->randomElement([null, null, $old_price]),
            'stock' => fake()->randomNumber(2),
            'sku' => fake()->slug(),
            'status' => fake()->randomElement([1]),
            'is_featured' => fake()->boolean(10),
        ];
    }
}
