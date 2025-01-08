<?php

namespace App\Containers\ProductSection\Product\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Containers\ProductSection\Product\Data\Factories\ProductFactory;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends ParentModel
{
    use SoftDeletes, HasFactory, CrudTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'old_price',
        'stock',
        'sku',
        'status',
        'is_featured',
    ];

    protected static function newFactory(): Factory|null
    {
        return ProductFactory::new();
    }
}
