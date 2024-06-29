<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $paymentTypes = [
            ['code' => '01', 'value' => 'CASH'],
            ['code' => '02', 'value' => 'CREDIT'],
            ['code' => '03', 'value' => 'CASH/CREDIT'],
            ['code' => '04', 'value' => 'BANK CHECK'],
            ['code' => '05', 'value' => 'DEBIT & CREDIT CARD'],
            ['code' => '06', 'value' => 'MOBILE MONEY'],
            ['code' => '07', 'value' => 'OTHER'],
        ];

        foreach ($paymentTypes as $paymentType) {
            PaymentType::firstOrCreate($paymentType);
        }
    }
}
