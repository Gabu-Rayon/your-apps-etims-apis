<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMoveItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "stockMoveId",
        "itemSeq",
        "itemCd",
        "itemClsCd",
        "itemNm",
        "bcd",
        "pkgUnitCd",
        "pkg",
        "qtyUnitCd",
        "qty",
        "itemExprDt",
        "prc",
        "splyAmt",
        "totDcAmt",
        "taxblAmt",
        "taxTyCd",
        "taxAmt",
        "totAmt"
    ];

    public function stockMoveList() {
        return $this->belongsTo(StockMoveList::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
