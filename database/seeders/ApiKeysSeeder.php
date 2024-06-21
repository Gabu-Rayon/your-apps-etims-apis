<?php

namespace Database\Seeders;

use App\Models\ApiKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiKeysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        ApiKey::firstOrCreate([
            'key' => '123456',
            'isUsed' => true,
            'activated' => true
        ]);
    }
}
