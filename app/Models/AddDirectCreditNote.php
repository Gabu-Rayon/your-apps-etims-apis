<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddDirectCreditNote extends Model
{
    use HasFactory;

    protected $table = 'add_direct_credit_note';
    protected $fillable = [
        "orgInvoiceNo",
        "traderInvoiceNo",
        "salesType",
        "paymentType",
        "creditNoteDate",
        "confirmDate",
        "salesDate",
        "stockReleseDate",
        "receiptPublishDate",
        "occurredDate",
        "creditNoteReason",
        "invoiceStatusCode",
        "isPurchaseAccept",
        "remark",
        "isStockIOUpdate",
        "mapping" // Add this field
    ];

    public function addDirectCreditNoteItemsList()
    {
        return $this->hasMany(AddDirectCreditNoteItemsList::class, 'add_direct_credit_note_id');
    }
}