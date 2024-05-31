<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchases')->insert([
            [
                'upplierTin' => '1234567890',
                'upplierBhfId' => 'BHFI001',
                'upplierName' => 'Supplier A',
                'upplierInvcNo' => 'INVC001',
                'purchTypeCode' => 'PTC001',
                'purchStatusCode' => 'PSC001',
                'pmtTypeCode' => 'PTM001',
                'purchDate' => '2022-01-01',
                'occurredDate' => '2022-01-05',
                'confirmDate' => '2022-01-10',
                'warehouseDate' => '2022-01-15',
                'emark' => 'This is a sample remark',
                'apping' => 'This is a sample mapping',
            ],
            [
                'upplierTin' => '9876543210',
                'upplierBhfId' => 'BHFI002',
                'upplierName' => 'Supplier B',
                'upplierInvcNo' => 'INVC002',
                'purchTypeCode' => 'PTC002',
                'purchStatusCode' => 'PSC002',
                'pmtTypeCode' => 'PTM002',
                'purchDate' => '2022-02-01',
                'occurredDate' => '2022-02-05',
                'confirmDate' => '2022-02-10',
                'warehouseDate' => '2022-02-15',
                'emark' => 'This is another sample remark',
                'apping' => 'This is another sample mapping',
            ],
        ]);
    }
}