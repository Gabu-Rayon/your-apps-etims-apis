<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingPurchase extends Model
{
    use HasFactory;
    protected $table = 'mapping_purchases';
    protected $fillable = [
        'supplierInvcNo',
        'purchaseTypeCode',
        'purchaseStatusCode'
    ];

    public function itemPurchases()
    {
        return $this->hasMany(MappingPurchaseItemList::class, 'mapped_purchase_id');
    }
}