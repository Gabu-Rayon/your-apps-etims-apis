<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSale extends Model
{
    use HasFactory;

    protected $table = 'add_sales';
    protected $fillable = [
        "customerNo",
        "customerTin",
        "customerName",
        "customerMobileNo",
        "salesType",
        "paymentType",
        "traderInvoiceNo",
        "confirmDate",
        "salesDate",
        "stockReleseDate",
        "receiptPublishDate",
        "occurredDate",
        "invoiceStatusCode",
        "remark",
        "isPurchaseAccept",
        "isStockIOUpdate",
        "mapping"
    ];

    public function addSaleItemList()
    {
        return $this->hasMany(AddSaleItemList::class, 'add_sale_id');
    }
}