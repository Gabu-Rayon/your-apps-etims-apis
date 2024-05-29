<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportedItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('imported_items')->insert([
            [
                'srNo' => '1',
                'taskCode' => 'TC001',
                'itemName' => 'Item 1',
                'hsCode' => '123456',
                'pkgUnitCode' => 'PCS',
                'netWeight' => 10.5,
                'invForCode' => 'INV001',
                'declarationDate' => '2023-01-01',
                'orginNationCode' => 'CN',
                'qty' => 100,
                'supplierName' => 'Supplier 1',
                'nvcFcurExcrt' => 1000.50,
                'itemSeq' => 1,
                'exprtNatCode' => 'US',
                'qtyUnitCode' => 'PCS',
                'agentName' => 'Agent 1',
                'declarationNo' => 'DEC001',
                'package' => 10,
                'grossWeight' => 15.5,
                'invForCurrencyAmount' => 1500.50,
                'mapped_itemCd' => null,
                'mapped_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'srNo' => '2',
                'taskCode' => 'TC002',
                'itemName' => 'Item 2',
                'hsCode' => '234567',
                'pkgUnitCode' => 'BOX',
                'netWeight' => 20.5,
                'invForCode' => 'INV002',
                'declarationDate' => '2023-01-02',
                'orginNationCode' => 'DE',
                'qty' => 200,
                'supplierName' => 'Supplier 2',
                'nvcFcurExcrt' => 2000.50,
                'itemSeq' => 2,
                'exprtNatCode' => 'CA',
                'qtyUnitCode' => 'BOX',
                'agentName' => 'Agent 2',
                'declarationNo' => 'DEC002',
                'package' => 20,
                'grossWeight' => 25.5,
                'invForCurrencyAmount' => 2500.50,
                'mapped_itemCd' => null,
                'mapped_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}