<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "itemCode",
        "itemClassifiCode",
        "itemTypeCode",
        "itemName",
        "itemStrdName",
        "countryCode",
        "pkgUnitCode",
        "qtyUnitCode",
        "taxTypeCode",
        "batchNo",
        "barcode",
        "unitPrice",
        "group1UnitPrice",
        "group2UnitPrice",
        "group3UnitPrice",
        "group4UnitPrice",
        "group5UnitPrice",
        "additionalInfo",
        "saftyQuantity",
        "isInrcApplicable",
        "isUsed",
        "quantity",
        "packageQuantity"
    ];

    public function composition_items()
    {
        return $this->hasMany(CompositionItem::class, 'mainItemCode', 'itemCode');
    }
}
