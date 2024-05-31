<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingPurchaseItemList extends Model
{
    use HasFactory;
    protected $table = 'mapping_purchases_items_list';
    protected $fillable = [
        'mapped_purchase_id',
        'supplierItemCode',
        'itemCode',
        'mapQuantity'
    ];

    public function mappedPurchase()
    {
        return $this->belongsTo(MappingPurchase::class, 'mapped_purchase_id');
    }
}