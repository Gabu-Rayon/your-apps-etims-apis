<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplierTin',
        'supplierBhfId',
        'supplierName',
        'supplierInvcNo',
        'purchTypeCode',
        'purchStatusCode',
        'pmtTypeCode',
        'purchDate',
        'occurredDate',
        'confirmDate',
        'warehouseDate',
        'remark',
        'mapping',
    ];

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id');
    }
}