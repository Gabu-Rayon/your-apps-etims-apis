<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UpdateStockIOData;

class UpdateStockIODataSeeder extends Seeder
{
    public function run()
    {
        // Create some sample data for UpdateStockIOData
        UpdateStockIOData::create([
            'storeReleaseTypeCode' => 'RELEASE_CODE_123',
            'remark' => 'This is a sample remark for testing'
        ]);

        UpdateStockIOData::create([
            'storeReleaseTypeCode' => 'RELEASE_CODE_456',
            'remark' => 'Another remark for testing purposes'
        ]);
    }
}