<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSaleItemList extends Model
{
    use HasFactory;

    protected $table = 'add_sale_item_list';
    protected $fillable = [
        'add_sale_id',
        "itemCode",
        "itemClassCode",
        "itemTypeCode",
        "itemName",
        "orgnNatCd",
        "taxTypeCode",
        "unitPrice",
        "isrcAplcbYn",
        "pkgUnitCode",
        "pkgQuantity",
        "qtyUnitCd",
        "quantity",
        "discountRate",
        "discountAmt",
        "itemExprDate"
    ];

    public function addSale()
    {
        return $this->belongsTo(AddSale::class, 'add_sale_id');
    }
}