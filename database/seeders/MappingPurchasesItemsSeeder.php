<?php
// database/seeds/MappingPurchasesItemsListSeeder.php

use App\Models\MappingPurchase;
use Illuminate\Database\Seeder;

class MappingPurchasesItemsListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assume you have some mapping purchases in the database
        $mappingPurchases = MappingPurchase::all();

        foreach ($mappingPurchases as $mappingPurchase) {
            // Create some dummy data for demonstration purposes
            $items = [
                [
                    'upplierItemCode' => 'SUPPLIER_ITEM_CODE_1',
                    'itemCode' => 'ITEM_CODE_1',
                    'apQuantity' => 10,
                ],
                [
                    'upplierItemCode' => 'SUPPLIER_ITEM_CODE_2',
                    'itemCode' => 'ITEM_CODE_2',
                    'apQuantity' => 20,
                ],
                // Add more items as needed
            ];

            foreach ($items as $item) {
                $mappingPurchase->itemsList()->create($item);
            }
        }
    }
}