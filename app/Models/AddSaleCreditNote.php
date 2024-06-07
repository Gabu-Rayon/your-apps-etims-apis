<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSaleCreditNote extends Model
{
    use HasFactory;

    protected $table = 'add_sale_credit_notes';

    protected $fillable = [
        'orgInvoiceNo',
        'customerTin',
        'customerName',
        'salesType',
        'paymentType',
        'creditNoteReason',
        'creditNoteDate',
        'traderInvoiceNo',
        'confirmDate',
        'salesDate',
        'stockReleseDate',
        'receiptPublishDate',
        'occurredDate',
        'invoiceStatusCode',
        'remark',
        'isPurchaseAccept',
        'isStockIOUpdate',
        'mapping'
    ];

    protected $appends = ['creditNoteItemsList'];

    public function addSaleCreditNoteItemsList()
    {
        return $this->hasMany(AddSaleCreditNoteItemsList::class, 'add_sale_credit_note_id');
    }

    public function getCreditNoteItemsListAttribute()
    {
        return $this->addSaleCreditNoteItemsList()->get();
    }


}