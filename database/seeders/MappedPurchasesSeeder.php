<?php
// database/seeders/MappedPurchasesSeeder.php

namespace Database\Seeders;

use App\Models\MappedPurchase;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MappedPurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            MappedPurchase::create([
                'invcNo' => $faker->randomNumber(5),
                'orgInvcNo' => $faker->randomNumber(5),
                'supplrTin' => $faker->randomNumber(9),
                'supplrBhfId' => $faker->randomNumber(5),
                'supplrName' => $faker->company,
                'supplrInvcNo' => $faker->randomNumber(5),
                'purchaseTypeCode' => $faker->randomElement(['N', 'R', 'C']),
                'rceiptTyCd' => $faker->randomElement(['P', 'R', 'D']),
                'paymentTypeCode' => $faker->randomElement(['01', '02', '03']),
                'purchaseSttsCd' => $faker->randomElement(['00', '01', '02']),
                'confirmDate' => $faker->optional()->date('Y-m-d'),
                'purchaseDate' => $faker->date('Ymd'),
                'warehouseDt' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'cnclReqDt' => $faker->optional()->date('Y-m-d'),
                'cnclDt' => $faker->optional()->date('Y-m-d'),
                'refundDate' => $faker->optional()->date('Y-m-d'),
                'totItemCnt' => $faker->numberBetween(1, 10),
                'taxblAmtA' => $faker->randomFloat(2, 100, 10000),
                'taxblAmtB' => $faker->randomFloat(2, 100, 10000),
                'taxblAmtC' => $faker->randomFloat(2, 100, 10000),
                'taxblAmtD' => $faker->randomFloat(2, 100, 10000),
                'taxRtA' => $faker->randomFloat(2, 0, 20),
                'taxRtB' => $faker->randomFloat(2, 0, 20),
                'taxRtC' => $faker->randomFloat(2, 0, 20),
                'taxRtD' => $faker->randomFloat(2, 0, 20),
                'taxAmtA' => $faker->randomFloat(2, 0, 2000),
                'taxAmtB' => $faker->randomFloat(2, 0, 2000),
                'taxAmtC' => $faker->randomFloat(2, 0, 2000),
                'taxAmtD' => $faker->randomFloat(2, 0, 2000),
                'totTaxblAmt' => $faker->randomFloat(2, 100, 10000),
                'totTaxAmt' => $faker->randomFloat(2, 100, 2000),
                'totAmt' => $faker->randomFloat(2, 1000, 20000),
                'remark' => $faker->sentence,
                'resultDt' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'createdDate' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'isUpload' => $faker->boolean,
                'isStockIOUpdate' => $faker->boolean,
                'isClientStockUpdate' => $faker->boolean,
            ]);
        }
    }
}