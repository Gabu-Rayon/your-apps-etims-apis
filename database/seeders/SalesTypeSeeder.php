<?php

namespace Database\Seeders;

use App\Models\SalesType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $salesTypes = [
            ['code' => 'C', 'value' => 'Copy'],
            ['code' => 'N', 'value' => 'Normal'],
            ['code' => 'T', 'value' => 'Training'],
            ['code' => 'P', 'value' => 'Proforma'],
        ];

        foreach ($salesTypes as $salesType) {
            SalesType::firstOrCreate($salesType);
        }
    }
}
