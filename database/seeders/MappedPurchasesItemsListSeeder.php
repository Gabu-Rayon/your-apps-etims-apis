<?php

// database/seeders/MappedPurchasesItemsListSeeder.php

namespace Database\Seeders;

use App\Models\MappedPurchaseItemList;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MappedPurchasesItemsListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 dummy records
        for ($i = 1; $i <= 10; $i++) {
            MappedPurchaseItemList::create([
                'mapped_purchase_id' => 1, // ensure there is a mapped purchase with id 1
                'itemSeq' => $i,
                'itemCd' => "ITEM_CD_{$i}",
                'itemClsCd' => "ITEM_CLS_CD_{$i}",
                'itemNmme' => "Item Name {$i}",
                'bcd' => $i % 2 == 0 ? 'BCD_' . $i : null,
                'supplrItemClsCd' => $i % 3 == 0 ? 'SUPPLR_ITEM_CLS_CD_' . $i : null,
                'supplrItemCd' => $i % 4 == 0 ? 'SUPPLR_ITEM_CD_' . $i : null,
                'supplrItemNm' => $i % 5 == 0 ? 'SUPPLR_ITEM_NM_' . $i : null,
                'pkgUnitCd' => 'PKG_UNIT_CD_' . $i,
                'pkg' => $i * 10.5,
                'qtyUnitCd' => 'QTY_UNIT_CD_' . $i,
                'qty' => $i * 2.5,
                'unitprice' => $i * 10.99,
                'supplyAmt' => $i * 50.99,
                'discountRate' => $i * 0.05,
                'discountAmt' => $i * 2.99,
                'taxblAmt' => $i * 10.99,
                'taxTyCd' => 'TAX_TY_CD_' . $i,
                'taxAmt' => $i * 2.99,
                'totAmt' => $i * 100.99,
                'itemExprDt' => $i % 2 == 0 ? Carbon::now()->addDays($i) : null,
            ]);
        }
    }
}