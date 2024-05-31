<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('api_keys')->insert([
            'key' => '123456',
            'isUsed' => true,
            'activated' => true,
        ]);

        DB::table('api_keys')->insert([
            'key' => '12345',
            'isUsed' => true,
            'activated' => true,
        ]);

        DB::table('api_keys')->insert([
            'key' => '123456789',
            'isUsed' => true,
            'activated' => null,
        ]);
    }
}