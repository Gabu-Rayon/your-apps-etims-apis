<?php

namespace Database\Seeders;

use App\Models\ImportedItemStatusCode as ModelsImportedItemStatusCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportedItemStatusCode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsImportedItemStatusCode::create([
            'code' => '1',
            'value' => 'Unsent',
        ]);

        ModelsImportedItemStatusCode::create([
            'code' => '2',
            'value' => 'Waiting',
        ]);

        ModelsImportedItemStatusCode::create([
            'code' => '3',
            'value' => 'Approved',
        ]);

        ModelsImportedItemStatusCode::create([
            'code' => '4',
            'value' => 'Cancelled',
        ]);
    }
}
