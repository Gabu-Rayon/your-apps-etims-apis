<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Code;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Code::firstOrCreate([
            'cdCls' => 'A1',
            'cdClsNm' => 'Class A1',
            'cdClsDesc' => 'Description for Class A1',
            'useYn' => 'Y',
            'userDfnNm1' => 'User Defined Name 1A',
            'userDfnNm2' => 'User Defined Name 2A',
            'userDfnNm3' => 'User Defined Name 3A'
        ]);
    }
}