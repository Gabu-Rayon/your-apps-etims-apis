<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemClassification;

class ItemClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "itemClsCd" => "001",
                "itemClsNm" => "Category A",
                "itemClsLvl" => 1,
                "taxTyCd" => "T001",
                "mjrTgYn" => true,
                "useYn" => true,
            ],
            [
                "itemClsCd" => "002",
                "itemClsNm" => "Category B",
                "itemClsLvl" => 1,
                "taxTyCd" => "T002",
                "mjrTgYn" => false,
                "useYn" => true,
            ],
            // Add more data as needed
        ];

        foreach ($data as $item) {
            ItemClassification::create($item);
        }
    }
}
