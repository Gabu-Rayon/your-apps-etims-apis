<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Detail;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detail::create([
            'cdCls' => 'A1',
            'cd' => 'CD001',
            'cdNm' => 'Code Name 1',
            'cdDesc' => 'Description for Code 1',
            'useYn' => 'Y',
            'srtOrd' => 1,
            'userDfnCd1' => 'User Defined Code 1A',
            'userDfnCd2' => 'User Defined Code 2A',
            'userDfnCd3' => 'User Defined Code 3A'
        ]);

        Detail::create([
            'cdCls' => 'A1',
            'cd' => 'CD002',
            'cdNm' => 'Code Name 2',
            'cdDesc' => 'Description for Code 2',
            'useYn' => 'N',
            'srtOrd' => 2,
            'userDfnCd1' => 'User Defined Code 1B',
            'userDfnCd2' => 'User Defined Code 2B',
            'userDfnCd3' => 'User Defined Code 3B'
        ]);
    }
}
