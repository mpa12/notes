<?php

namespace App\Containers\ProductSection\ProductCategory\Models;

use App\Containers\ProductSection\ProductCategory\Data\Factories\ProductCategoryFactory;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends ParentModel
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'image',
        'status',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    protected static function newFactory(): Factory|null
    {
        return ProductCategoryFactory::new();
    }
}
