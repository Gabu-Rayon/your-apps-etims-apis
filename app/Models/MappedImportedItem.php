<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappedImportedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'importItemStatusCode',
        'declarationDate',
        'occurredDate',
        'remark',
    ];

    public function importedItemLists()
    {
        return $this->hasMany(MappedImportedItemList::class, 'mapped_imported_item_id');
    }
}