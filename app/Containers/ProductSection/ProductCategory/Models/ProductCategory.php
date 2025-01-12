<?php

namespace App\Containers\ProductSection\ProductCategory\Models;

use App\Containers\ProductSection\ProductCategory\Enums\ProductCategoryStatusEnum;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Containers\ProductSection\ProductCategory\Data\Factories\ProductCategoryFactory;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ProductCategory extends ParentModel
{
    use SoftDeletes, HasFactory, CrudTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => ProductCategoryStatusEnum::class,
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function setImageAttribute($value)
    {
        $attribute_name = 'image';
        $disk = 'public';
        $destination_path = 'product-categories';

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

         return $this->attributes[$attribute_name]; // uncomment if this is a translatable field
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }

    protected static function newFactory(): Factory|null
    {
        return ProductCategoryFactory::new();
    }
}
