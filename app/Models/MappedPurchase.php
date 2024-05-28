<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappedPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplierInvcNo',
        'purchaseTypeCode',
        'purchaseStatusCode'
    ];

    public function itemPurchases()
    {
        return $this->hasMany(MappedPurchaseItemList::class, 'mapped_purchase_id');
    }
}