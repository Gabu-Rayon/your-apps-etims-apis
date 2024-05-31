<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchase_items')->insert([
            [
                'purchase_id' => 1,
                'itemCode' => 'ITEM001',
                'upplrItemClsCode' => 'SICC001',
                'upplrItemCode' => 'SIC001',
                'upplrItemname' => 'Supplier Item 1',
                'quantity' => 10.00,
                'unitPrice' => 100.00,
                'pkgQuantity' => 5.00,
                'discountRate' => 5.00,
                'discountAmt' => 50.00,
                'itemExprDt' => '2022-01-01',
            ],
            [
                'purchase_id' => 1,
                'itemCode' => 'ITEM002',
                'upplrItemClsCode' => 'SICC002',
                'upplrItemCode' => 'SIC002',
                'upplrItemname' => 'Supplier Item 2',
                'quantity' => 20.00,
                'unitPrice' => 200.00,
                'pkgQuantity' => 10.00,
                'discountRate' => 10.00,
                'discountAmt' => 200.00,
                'itemExprDt' => '2022-01-05',
            ],
            [
                'purchase_id' => 2,
                'itemCode' => 'ITEM003',
                'upplrItemClsCode' => 'SICC003',
                'upplrItemCode' => 'SIC003',
                'upplrItemname' => 'Supplier Item 3',
                'quantity' => 30.00,
                'unitPrice' => 300.00,
                'pkgQuantity' => 15.00,
                'discountRate' => 15.00,
                'discountAmt' => 450.00,
                'itemExprDt' => '2022-01-10',
            ],
        ]);
    }
}