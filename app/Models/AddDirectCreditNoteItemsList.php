<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddDirectCreditNoteItemsList extends Model
{
    use HasFactory;

    protected $table = 'add_direct_credit_note_item_list';
    protected $fillable = [
        'add_direct_credit_note_id',
        "itemCode",
        "unitPrice",
        "quantity"
    ];

    public function addDirectCreditNote()
    {
        return $this->belongsTo(AddDirectCreditNote::class, 'add_direct_credit_note_id');
    }
}