<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappedPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'invcNo',
        'orgInvcNo',
        'supplrTin',
        'supplrBhfId',
        'supplrName',
        'supplierInvcNo',
        'purchaseTypeCode',
        'rceiptTyCd',
        'paymentTypeCode',
        'purchaseSttsCd',
        'confirmDate',
        'purchaseDate',
        'warehouseDt',
        'cnclReqDt',
        'cnclDt',
        'refundDate',
        'totItemCnt',
        'taxblAmtA',
        'taxblAmtB',
        'taxblAmtC',
        'taxblAmtD',
        'taxRtA',
        'taxRtB',
        'taxRtC',
        'taxRtD',
        'taxAmtA',
        'taxAmtB',
        'taxAmtC',
        'taxAmtD',
        'totTaxblAmt',
        'totTaxAmt',
        'totAmt',
        'remark',
        'resultDt',
        'createdDate',
        'isUpload',
        'isStockIOUpdate',
        'isClientStockUpdate'
    ];

    public function items()
    {
        return $this->hasMany(MappedPurchaseItemList::class);
    }
}