<?php

namespace App\Containers\ProductSection\Product\Models;

use App\Containers\ProductSection\Product\Enum\ProductStatusEnum;
use App\Containers\ProductSection\ProductCategory\Models\ProductCategory;
use App\Containers\ProductSection\ProductImage\Models\ProductImage;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Containers\ProductSection\Product\Data\Factories\ProductFactory;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Collection $images
 */
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
        'product_category_id',
    ];

    protected $casts = [
        'status' => ProductStatusEnum::class,
    ];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('position');
    }

    protected static function newFactory(): Factory|null
    {
        return ProductFactory::new();
    }
}
