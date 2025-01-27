<?php

namespace App\Containers\ProductSection\ProductImage\Models;

use App\Containers\ProductSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends ParentModel
{
    protected $fillable = [
        'product_id',
        'url',
        'alt_text',
        'position',
        'is_main',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
