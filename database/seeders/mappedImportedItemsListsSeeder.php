<?php 

// database/seeds/MappedImportedItemListSeeder.php

use App\Models\MappedImportedItem;
use App\Models\MappedImportedItemList;
use Illuminate\Database\Seeder;

class MappedImportedItemListSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
// Get all mapped imported items
$mappedImportedItems = MappedImportedItem::all();

// Create some sample data for the mapped imported item lists
foreach ($mappedImportedItems as $mappedImportedItem) {
factory(MappedImportedItemList::class, 5)->create([
'apped_imported_item_id' => $mappedImportedItem->id,
'taskCode' => 'TASK-'. rand(1, 100),
'itemCode' => 'ITEM-'. rand(1, 100),
]);
}
}
}