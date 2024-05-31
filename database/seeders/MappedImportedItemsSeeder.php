<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MappedImportedItemsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapped_imported_items')->insert([
            'importItemStatusCode' => 1,
            'declarationDate' => '2022-01-01',
            'occurredDate' => '2022-01-01',
            'remark' => 'This is a sample remark.',
        ]);

        // Add more records here as needed
    }
}