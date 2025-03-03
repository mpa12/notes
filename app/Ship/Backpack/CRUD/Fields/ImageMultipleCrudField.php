<?php

namespace App\Ship\Backpack\CRUD\Fields;

use App\Containers\ProductSection\Product\Models\Product;
use App\Containers\ProductSection\ProductImage\Actions\UpdateProductImagesAction;
use App\Ship\Parents\Backpack\CrudField;

class ImageMultipleCrudField extends CrudField
{
    private array $definitions;

    public function __construct($nameOrDefinitionArray)
    {
        $nameOrDefinitionArray = array_merge([
            'label' => 'Images',
            'name' => 'images',
            'type' => 'image_multiple',
            'events' => [
                'saved' => [$this, 'saved'],
            ]
        ], $nameOrDefinitionArray);

        $this->definitions = $nameOrDefinitionArray;

        parent::__construct($nameOrDefinitionArray);
    }

    private function saved(Product $product): void
    {
        $name = $this->definitions['name'];

        app(UpdateProductImagesAction::class)->run($product, $name);
    }
}