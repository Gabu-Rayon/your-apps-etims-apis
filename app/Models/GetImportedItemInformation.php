<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetImportedItemInformation extends Model
{
    
    use HasFactory;
    protected $table = 'imported_items';
    protected $fillable = [
        'srNo',
        'taskCode',
        'itemName',
        'hsCode',
        'pkgUnitCode',
        'netWeight',
        'invForCode',
        'declarationDate',
        'orginNationCode',
        'qty',
        'supplierName',
        'nvcFcurExcrt',
        'itemSeq',
        'exprtNatCode',
        'qtyUnitCode',
        'agentName',
        'declarationNo',
        'package',
        'grossWeight',
        'invForCurrencyAmount',
        'status',
        'mapped_itemCd',
        'mapped_date',
        'created_by'
    ];

    protected $casts = [
        'mapped_date' => 'datetime',
    ];
}