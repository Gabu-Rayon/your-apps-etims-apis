<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        "tin",
        "bhfId",
        "bhfNm",
        "bhfSttsCd",
        "prvncNm",
        "dstrtNm",
        "sctrNm",
        "locDesc",
        "mgrNm",
        "mgrTelNo",
        "mgrEmail",
        "hqYn"
    ];

    public function initialization () {
        return $this->hasOne(Initialization::class, "bhfId", "bhfId");
    }

    public function customers () {
        return $this->hasMany(Customer::class, "bhfId", "bhfId");
    }

    // TODO: Add a insurances function to get the insurances that the branch has
}
