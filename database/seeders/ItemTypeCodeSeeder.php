<?php

namespace Database\Seeders;

use App\Models\ItemTypeCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemTypeCodes = [
            [
                "code" => "1",
                "name" => "Raw Material",
            ],
            [
                "code" => "2",
                "name" => "Finished Product",
            ],
            [
                "code" => "3",
                "name" => "Service",
            ],
        ];

        foreach ($itemTypeCodes as $itemTypeCode) {
            ItemTypeCode::create($itemTypeCode);
        }
    }
}
