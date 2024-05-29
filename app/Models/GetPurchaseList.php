<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPurchaseList extends Model
{
    use HasFactory;

    protected $table = 'purchase_lists';

    protected $fillable = [
        'spplrTin',
        'spplrNm',
        'spplrBhfId',
        'spplrInvcNo',
        'spplrSdcId',
        'spplrMrcNo',
        'rcptTyCd',
        'pmtTyCd',
        'cfmDt',
        'salesDt',
        'stockRlsDt',
        'totItemCnt',
        'taxblAmtA',
        'taxblAmtB',
        'taxblAmtC',
        'taxblAmtD',
        'taxblAmtE',
        'taxRtA',
        'taxRtB',
        'taxRtC',
        'taxRtD',
        'taxRtE',
        'taxAmtA',
        'taxAmtB',
        'taxAmtC',
        'taxAmtD',
        'taxAmtE',
        'totTaxblAmt',
        'totTaxAmt',
        'totAmt',
        'remark',
    ];

    protected $casts = [
        'cfmDt' => 'datetime',
        'salesDt' => 'date',
        'stockRlsDt' => 'datetime',
    ];


    // Define the relationship with GetPurchaseListsItem
    // Define the relationship with GetPurchaseListsItem using 'purchase_list_id'
    public function items()
    {
        return $this->hasMany(GetPurchaseListsItem::class, 'purchase_list_id');
    }
}