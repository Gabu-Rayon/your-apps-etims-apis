<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UpdateStockIODataItemList;

class UpdateStockIODataItemListSeeder extends Seeder
{
    public function run()
    {
        // Create some sample data for UpdateStockIODataItemList
        UpdateStockIODataItemList::create([
            'update_stock_io_data_id' => 1,
            'itemCode' => 'ITEM_CODE_1',
            'packageQuantity' => 10,
            'quantity' => 100
        ]);

        UpdateStockIODataItemList::create([
            'update_stock_io_data_id' => 1, 
            'itemCode' => 'ITEM_CODE_2',
            'packageQuantity' => 5,
            'quantity' => 50
        ]);

        UpdateStockIODataItemList::create([
            'update_stock_io_data_id' => 2,
            'itemCode' => 'ITEM_CODE_3',
            'packageQuantity' => 20,
            'quantity' => 200
        ]);
    }
}