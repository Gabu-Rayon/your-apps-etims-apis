<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustmentItemList extends Model
{
    use HasFactory;
    protected $table = 'stock_adjustment_item_lists';
    protected $fillable = [
        'stock_adjustment_id',
        'itemCode',
        'packageQuantity',
        'quantity',
    ];

    public function stockAdjustment()
    {
        return $this->belongsTo(StockAdjustment::class);
    }
}