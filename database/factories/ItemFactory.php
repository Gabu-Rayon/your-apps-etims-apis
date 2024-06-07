<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'itemCode' => $this->faker->unique()->numerify('ITEM###'),
            'itemClassifiCode' => $this->faker->numerify('CLASS###'),
            'itemTypeCode' => $this->faker->randomElement([1, 2, 3]),
            'itemName' => $this->faker->word,
            'itemStrdName' => $this->faker->word,
            'countryCode' => $this->faker->countryCode,
            'pkgUnitCode' => $this->faker->numerify('PKG###'),
            'qtyUnitCode' => $this->faker->numerify('QTY###'),
            'taxTypeCode' => $this->faker->numerify('TAX###'),
            'batchNo' => $this->faker->numerify('BATCH###'),
            'barcode' => $this->faker->ean13,
            'unitPrice' => $this->faker->randomFloat(2, 1, 1000),
            'group1UnitPrice' => $this->faker->randomFloat(2, 1, 1000),
            'group2UnitPrice' => $this->faker->randomFloat(2, 1, 1000),
            'group3UnitPrice' => $this->faker->randomFloat(2, 1, 1000),
            'group4UnitPrice' => $this->faker->randomFloat(2, 1, 1000),
            'group5UnitPrice' => $this->faker->randomFloat(2, 1, 1000),
            'additionalInfo' => $this->faker->sentence,
            'saftyQuantity' => $this->faker->randomNumber(2),
            'isInrcApplicable' => $this->faker->boolean,
            'isUsed' => $this->faker->boolean,
            'quantity' => $this->faker->randomNumber(2),
            'packageQuantity' => $this->faker->randomNumber(2),
        ];
    }
}
