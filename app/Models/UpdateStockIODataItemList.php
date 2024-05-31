<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateStockIODataItemList extends Model
{
    use HasFactory;

    protected $table = 'update_stock_io_data_item_lists';

    protected $fillable = ['update_stock_io_data_id', 'itemCode', 'packageQuantity', 'quantity'];

    public function updateStockIOData()
    {
        return $this->belongsTo(UpdateStockIOData::class, 'update_stock_io_data_id');
    }
}