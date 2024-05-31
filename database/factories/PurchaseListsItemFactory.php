<?php

// PurchaseListsItemFactory.php

namespace Database\Factories;

use App\Models\PurchaseListsItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseListsItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseListsItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'itemSeq' => $this->faker->randomNumber(5),
            'itemCd' => $this->faker->word,
            'itemClsCd' => $this->faker->word,
            'itemNm' => $this->faker->word,
            'bcd' => $this->faker->word,
            'pplrItemClsCd' => $this->faker->word,
            'pplrItemCd' => $this->faker->word,
            'pplrItemNm' => $this->faker->word,
            'pkgUnitCd' => $this->faker->word,
            'pkg' => $this->faker->randomNumber(2),
            'qtyUnitCd' => $this->faker->word,
            'qty' => $this->faker->randomNumber(2),
            'prc' => $this->faker->randomFloat(1, 2),
            'plyAmt' => $this->faker->randomFloat(1, 2),
            'dcRt' => $this->faker->randomFloat(1, 2),
            'dcAmt' => $this->faker->randomFloat(1, 2),
            'taxTyCd' => $this->faker->word,
            'taxblAmt' => $this->faker->randomFloat(1, 2),
            'taxAmt' => $this->faker->randomFloat(1, 2),
            'totAmt' => $this->faker->randomFloat(1, 2),
            'itemExprDt' => now(),
        ];
    }
}