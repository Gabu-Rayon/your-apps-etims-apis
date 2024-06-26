<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_id',
        'itemCode',
        'supplrItemClsCode',
        'supplrItemCode',
        'supplrItemName',
        'quantity',
        'unitPrice',
        'pkgQuantity',
        'discountRate',
        'discountAmt',
        'itemExprDt',
    ];


    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }
}