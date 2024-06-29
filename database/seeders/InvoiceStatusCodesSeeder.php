<?php

namespace Database\Seeders;

use App\Models\InvoiceStatusCodes;
use Illuminate\Database\Seeder;

class InvoiceStatusCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $invoiceStatusCodes = [
            ['code' => '01', 'value' => 'Wait for Approval'],
            ['code' => '02', 'value' => 'Approved'],
            ['code' => '03', 'value' => 'Cancel Requested'],
            ['code' => '04', 'value' => 'Canceled'],
            ['code' => '05', 'value' => 'Credit Note Generated'],
            ['code' => '06', 'value' => 'Transferred'],
        ];

        foreach ($invoiceStatusCodes as $invoiceStatusCode) {
            InvoiceStatusCodes::firstOrCreate($invoiceStatusCode);
        }
    }
}
