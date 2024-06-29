<?php

namespace Database\Seeders;

use App\Models\CreditNoteReasons;
use Illuminate\Database\Seeder;

class CreditNoteReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $creditNoteReasons = [
            ['code' => '01', 'value' => 'Missing Quantity'],
            ['code' => '02', 'value' => 'Missing data'],
            ['code' => '03', 'value' => 'Damaged'],
            ['code' => '04', 'value' => 'Wasted'],
            ['code' => '05', 'value' => 'Raw Material Shortage'],
            ['code' => '06', 'value' => 'Refund'],
        ];

        foreach ($creditNoteReasons as $creditNoteReason) {
            CreditNoteReasons::firstOrCreate($creditNoteReason);
        }
    }
}
