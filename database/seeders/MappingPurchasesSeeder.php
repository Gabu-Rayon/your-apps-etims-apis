<?php

// database/seeds/MappingPurchasesSeeder.php

use App\Models\MappingPurchase;
use Illuminate\Database\Seeder;

class MappingPurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some sample data
        $data = [
            [
                'supplierInvcNo' => 'INV-001',
                'purchaseTypeCode' => 'PT-001',
                'purchaseStatusCode' => 'PS-001',
            ],
            [
                'supplierInvcNo' => 'INV-002',
                'purchaseTypeCode' => 'PT-002',
                'purchaseStatusCode' => 'PS-002',
            ],
            // Add more data as needed
        ];

        // Insert the data into the table
        foreach ($data as $item) {
            MappingPurchase::create($item);
        }
    }
}