<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        "customerNo",
        "customerTin",
        "customerName",
        "bhfId",
        "address",
        "telNo",
        "email",
        "faxNo",
        "isUsed",
        "remark"
    ];

    public function stockMoveList() {
        return $this->hasMany(StockMoveList::class, 'custTin', 'customerTin');
    }
    
    public function branch() {
        return $this->belongsTo(Branch::class, 'bhfId', 'bhfId');
    }
}
