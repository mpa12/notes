<?php

namespace App\Containers\NotesSection\Notes\Data\Factories;

use App\Containers\NotesSection\Notes\Models\Notes;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Notes
 *
 * @extends ParentFactory<TModel>
 */
class NotesFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Notes::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
        ];
    }
}
