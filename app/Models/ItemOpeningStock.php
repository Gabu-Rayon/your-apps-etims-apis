<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOpeningStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemCode',
        'quantity',
        'packageQuantity',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemCode', 'itemCode');
    }
}
