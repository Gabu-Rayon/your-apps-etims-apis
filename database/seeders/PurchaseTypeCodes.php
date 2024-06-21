<?php

namespace Database\Seeders;

use App\Models\PurchaseTypeCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseTypeCodes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PurchaseTypeCode::firstOrCreate([
            'code' => 'C',
            'value' => 'Copy',
        ]);

        PurchaseTypeCode::firstOrCreate([
            'code' => 'N',
            'value' => 'Normal',
        ]);

        PurchaseTypeCode::firstOrCreate([
            'code' => 'P',
            'value' => 'Proforma',
        ]);

        PurchaseTypeCode::firstOrCreate([
            'code' => 'T',
            'value' => 'Training',
        ]);
    }
}
