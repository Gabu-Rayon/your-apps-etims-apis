<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMoveList extends Model
{
    use HasFactory;

    protected $fillable = [
        "custTin",
        "custBhfId",
        "sarNo",
        "ocrnDt",
        "totItemCnt",
        "totTaxblAmt",
        "totTaxAmt",
        "totAmt",
        "remark"
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function items() {
        return $this->hasMany(StockMoveItem::class);
    }
}
