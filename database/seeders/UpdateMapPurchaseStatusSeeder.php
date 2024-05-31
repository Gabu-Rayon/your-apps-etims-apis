<?php

use App\Models\UpdateMapPurchaseStatus;
use Illuminate\Database\Seeder;

class UpdateMapPurchaseStatusSeeder extends Seeder
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
                'invoiceNo' => 1,
                'isUpdate' => true,
            ],
            [
                'invoiceNo' => 2,
                'isUpdate' => false,
            ],
            [
                'invoiceNo' => 3,
                'isUpdate' => true,
            ],
            // Add more data as needed
        ];

        // Insert the data into the table
        foreach ($data as $item) {
            UpdateMapPurchaseStatus::create($item);
        }
    }
}