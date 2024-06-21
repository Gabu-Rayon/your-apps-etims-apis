<?php

namespace Database\Seeders;

use App\Models\PaymentTypeCodes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusCodes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentTypeCodes::firstOrCreate([
            'code' => '01',
            'value' => 'CASH',
        ]);

        PaymentTypeCodes::firstOrCreate([
            'code' => '02',
            'value' => 'CREDIT',
        ]);

        PaymentTypeCodes::firstOrCreate([
            'code' => '03',
            'value' => 'CASH/CREDIT',
        ]);

        PaymentTypeCodes::firstOrCreate([
            'code' => '04',
            'value' => 'BANK CHEQUE',
        ]);

        PaymentTypeCodes::firstOrCreate([
            'code' => '05',
            'value' => 'DEBIT & CREDIT CARD',
        ]);

        PaymentTypeCodes::firstOrCreate([
            'code' => '06',
            'value' => 'MOBILE MONEY',
        ]);

        PaymentTypeCodes::firstOrCreate([
            'code' => '07',
            'value' => 'OTHER',
        ]);
    }
}
