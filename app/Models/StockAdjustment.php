<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    use HasFactory;
    protected $table = 'stock_adjustments';
    protected $fillable = [
        'storeReleaseTypeCode',
        'remark',
    ];

    public function items()
    {
        return $this->hasMany(StockAdjustmentItemList::class);
    }
}