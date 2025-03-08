<?php

namespace App\Ship\Backpack\CRUD\Fields;

use App\Ship\Parents\Backpack\CrudField;
use App\Ship\Parents\Models\Model;

class ImageMultipleCrudField extends CrudField
{
    private array $definitions;
    private mixed $savedCallback;

    public function __construct($nameOrDefinitionArray)
    {
        $nameOrDefinitionArray = array_merge([
            'label' => 'Images',
            'name' => 'images',
            'type' => 'image_multiple',
            'events' => [
                'saved' => $this->saved(...),
            ],
            'savedCallback' => null,
            'suffix' => 'ImageMultipleCrudField',
        ], $nameOrDefinitionArray);

        $this->definitions = $nameOrDefinitionArray;

        $this->savedCallback = $nameOrDefinitionArray['savedCallback'];

        parent::__construct($nameOrDefinitionArray);
    }

    private function saved(Model $model): void
    {
        $name = $this->definitions['name'];
        $suffix = $this->definitions['suffix'];

        $requestData = collect(json_decode(request()->input("$name-$suffix")));

        if (is_callable($this->savedCallback)) {
            call_user_func($this->savedCallback, $model, $requestData);
        }
    }
}