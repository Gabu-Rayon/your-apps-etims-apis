<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        "itemClsCd",
        "itemClsNm",
        "itemClsLvl",
        "taxTyCd",
        "mjrTgYn",
        "useYn"
    ];
}
