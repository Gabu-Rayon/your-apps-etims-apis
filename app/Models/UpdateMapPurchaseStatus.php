<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateMapPurchaseStatus extends Model
{
    use HasFactory;

    protected $table = 'update_map_purchase_status';
    protected $fillable = [
        'invoiceNo',
        'isUpdate'
    ];
}