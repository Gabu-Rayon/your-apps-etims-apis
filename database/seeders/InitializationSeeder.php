<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Initialization;

class InitializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "tin" => "1234567890",
                "bhfId" => "01",
                "dvcSrlNo" => "A1"
            ],
            [
                "tin" => "0987654321",
                "bhfId" => "02",
                "dvcSrlNo" => "B1"
            ],
        ];

        foreach ($data as $item) {
            Initialization::create($item);
        }
    }
}
