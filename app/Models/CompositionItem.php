<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompositionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'mainItemCode',
        'compoItemCode',
        'compoItemQty'
    ];

    public function item () {
        return $this->belongsTo(Item::class, 'mainItemCode', 'itemCode');
    }
}
