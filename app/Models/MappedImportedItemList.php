<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappedImportedItemList extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapped_imported_item_id',
        'taskCode',
        'itemCode',
    ];

    public function importedItem()
    {
        return $this->belongsTo(MappedImportedItem::class, 'mapped_imported_item_id');
    }
}