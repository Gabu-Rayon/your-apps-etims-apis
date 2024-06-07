<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        "cdCls",
        "cd",
        "cdNm",
        "cdDesc",
        "useYn",
        "srtOrd",
        "userDfnCd1",
        "userDfnCd2",
        "userDfnCd3"
    ];

    public function code () {
        return $this->belongsTo(Code::class, 'cdCls', 'cdCls');
    }
}
