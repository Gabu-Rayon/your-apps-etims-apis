<?php
// database/factories/MappedImportedItemListFactory.php

use App\Models\MappedImportedItemList;
use Illuminate\Database\Eloquent\Factories\Factory;

class MappedImportedItemListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MappedImportedItemList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mapped_imported_item_id' => null,
            'taskCode' => null,
            'itemCode' => null,
        ];
    }
}