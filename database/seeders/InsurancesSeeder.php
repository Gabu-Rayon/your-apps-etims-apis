<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsurancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('insurances')->insert([
            [
                'insuranceCode' => 'INS001',
                'insuranceName' => 'Insurance Company A',
                'premiumRate' => 100.00,
                'isUsed' => true,
            ],
            [
                'insuranceCode' => 'INS002',
                'insuranceName' => 'Insurance Company B',
                'premiumRate' => 150.00,
                'isUsed' => false,
            ],
        ]);
    }
}