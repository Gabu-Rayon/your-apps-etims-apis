<?php

namespace Database\Seeders;

use App\Models\ItemTypeCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeCodes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        ItemTypeCode::firstOrCreate([
            'code' => '1',
            'name' => 'Raw Material',
        ]);

        ItemTypeCode::firstOrCreate([
            'code' => '2',
            'name' => 'Finished Product',
        ]);

        ItemTypeCode::firstOrCreate([
            'code' => '1',
            'name' => 'Service',
        ]);
    }
}
