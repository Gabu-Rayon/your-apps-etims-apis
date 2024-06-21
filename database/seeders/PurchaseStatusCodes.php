<?php

namespace Database\Seeders;

use App\Models\PurchaseStatusCodes as ModelsPurchaseStatusCodes;
use Illuminate\Database\Seeder;

class PurchaseStatusCodes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPurchaseStatusCodes::firstOrCreate([
            'code' => '01',
            'value' => 'Waiting for Approval',
        ]);

        ModelsPurchaseStatusCodes::firstOrCreate([
            'code' => '02',
            'value' => 'Approved',
        ]);

        ModelsPurchaseStatusCodes::firstOrCreate([
            'code' => '03',
            'value' => 'Cancel Requested',
        ]);

        ModelsPurchaseStatusCodes::firstOrCreate([
            'code' => '04',
            'value' => 'Canceled',
        ]);

        ModelsPurchaseStatusCodes::firstOrCreate([
            'code' => '05',
            'value' => 'Credit Note Generated',
        ]);

        ModelsPurchaseStatusCodes::firstOrCreate([
            'code' => '06',
            'value' => 'Transferred',
        ]);
    }
}
