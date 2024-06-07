<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSaleCreditNoteItemsList extends Model
{
    use HasFactory;

    protected $table = 'add_sale_credit_note_items_lists';

    protected $fillable = [
        'add_sale_credit_note_id',
        'itemCode',
        'itemClassCode',
        'itemTypeCode',
        'itemName',
        'orgnNatCd',
        'taxTypeCode',
        'unitPrice',
        'isrcAplcbYn',
        'pkgUnitCode',
        'pkgQuantity',
        'qtyUnitCd',
        'quantity',
        'discountRate',
        'discountAmt',
        'itemExprDate'
    ];

    public function addSaleCreditNote()
    {
        return $this->belongsTo(AddSaleCreditNote::class, 'add_sale_credit_note_id');
    }
}