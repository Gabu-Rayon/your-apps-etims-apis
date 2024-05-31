<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPurchaseListsItem extends Model
{
    use HasFactory;


    protected $table = 'purchase_lists_items';

    protected $fillable = [
        'purchase_list_id',
        'itemSeq',
        'itemCd',
        'itemClsCd',
        'itemNm',
        'pkgUnitCd',
        'pkg',
        'qtyUnitCd',
        'qty',
        'prc',
        'splyAmt',
        'dcRt',
        'dcAmt',
        'taxTyCd',
        'taxblAmt',
        'taxAmt',
        'totAmt',
        'itemExprDt',
    ];
    // Define the inverse relationship with GetPurchaseList
    public function purchaseList()
    {
        return $this->belongsTo(GetPurchaseList::class, 'purchase_list_id');
    }
}