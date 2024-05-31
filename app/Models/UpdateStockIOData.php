<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateStockIOData extends Model
{
    use HasFactory;

    protected $table = 'update_stock_io_data';

    protected $fillable = ['storeReleaseTypeCode', 'remark'];
    public function updateStockIODataItemList()
    {
        return $this->hasMany(UpdateStockIODataItemList::class, 'update_stock_io_data_id');
    }
    
}