<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "bhfId" => "01",
                "bhfNm" => "Branch A",
                "bhfSttsCd" => "Active",
                "prvncNm" => "Province A",
                "dstrtNm" => "District A",
                "sctrNm" => "Sector A",
                "locDesc" => "Location A",
                "mgrNm" => "Manager A",
                "mgrTelNo" => "1234567890",
                "mgrEmail" => "manager@example.com",
                "hqYn" => true
            ],
            [
                "bhfId" => "02",
                "bhfNm" => "Branch B",
                "bhfSttsCd" => "Active",
                "prvncNm" => "Province B",
                "dstrtNm" => "District B",
                "sctrNm" => "Sector B",
                "locDesc" => "Location B",
                "mgrNm" => "Manager B",
                "mgrTelNo" => "0987654321",
                "mgrEmail" => "manager2@example.com",
                "hqYn" => false
            ],
        ];

        foreach ($data as $item) {
            Branch::create($item);
        }
    }
}
