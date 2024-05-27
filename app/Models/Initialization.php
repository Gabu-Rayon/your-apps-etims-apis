<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Initialization extends Model
{
    use HasFactory;

    protected $fillable = [
        "tin",
        "bhfId",
        "dvcSrlNo"
    ];

    public function branch () {
        return $this->belongsTo(Branch::class, "bhfId", "bhfId");
    }
}
