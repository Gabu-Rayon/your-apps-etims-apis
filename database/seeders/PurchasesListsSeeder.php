<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchase_lists')->insert([
            [
                'pplrTin' => '1234567890',
                'pplrNm' => 'Supplier A',
                'pplrBhfId' => 'BHFI001',
                'pplrInvcNo' => 'INVC001',
                'pplrSdcId' => 'SDC001',
                'pplrMrcNo' => 'MRC001',
                'rcptTyCd' => 'RCT001',
                'pmtTyCd' => 'PMT001',
                'cfmDt' => '2022-01-01 00:00:00',
                'alesDt' => '2022-01-01',
                'tockRlsDt' => '2022-01-05 00:00:00',
                'totItemCnt' => 10,
                'taxblAmtA' => 100.00,
                'taxblAmtB' => 200.00,
                'taxblAmtC' => 300.00,
                'taxblAmtD' => 400.00,
                'taxblAmtE' => 500.00,
                'taxRtA' => 10.00,
                'taxRtB' => 20.00,
                'taxRtC' => 30.00,
                'taxRtD' => 40.00,
                'taxRtE' => 50.00,
                'taxAmtA' => 10.00,
                'taxAmtB' => 20.00,
                'taxAmtC' => 30.00,
                'taxAmtD' => 40.00,
                'taxAmtE' => 50.00,
                'totTaxblAmt' => 1500.00,
                'totTaxAmt' => 150.00,
                'totAmt' => 1650.00,
                'emark' => 'This is a sample remark',
            ],
            [
                'pplrTin' => '9876543210',
                'pplrNm' => 'Supplier B',
                'pplrBhfId' => 'BHFI002',
                'pplrInvcNo' => 'INVC002',
                'pplrSdcId' => 'SDC002',
                'pplrMrcNo' => 'MRC002',
                'rcptTyCd' => 'RCT002',
                'pmtTyCd' => 'PMT002',
                'cfmDt' => '2022-02-01 00:00:00',
                'alesDt' => '2022-02-01',
                'tockRlsDt' => '2022-02-05 00:00:00',
                'totItemCnt' => 20,
                'taxblAmtA' => 200.00,
                'taxblAmtB' => 400.00,
                'taxblAmtC' => 600.00,
                'taxblAmtD' => 800.00,
                'taxblAmtE' => 1000.00,
                'taxRtA' => 20.00,
                'taxRtB' => 40.00,
                'taxRtC' => 60.00,
                'taxRtD' => 80.00,
                'taxRtE' => 100.00,
                'taxAmtA' => 20.00,
                'taxAmtB' => 40.00,
                'taxAmtC' => 60.00,
                'taxAmtD' => 80.00,
                'taxAmtE' => 100.00,
                'totTaxblAmt' => 3000.00,
                'totTaxAmt' => 300.00,
                'totAmt' => 3300.00,
                'emark' => 'This is another sample remark',
            ],
        ]);
    }
}