<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notice;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "noticeNo" => "01",
                "title" => "Important Notice 1",
                "cont" => "This is the content of notice 1.",
                "dtlUrl" => "https://example.com/notice1",
                "regrNm" => "Admin",
                "regDt" => now(),
            ],
            [
                "noticeNo" => "02",
                "title" => "Important Notice 2",
                "cont" => "This is the content of notice 2.",
                "dtlUrl" => "https://example.com/notice2",
                "regrNm" => "Admin",
                "regDt" => now(),
            ],
        ];

        foreach ($data as $item) {
            Notice::create($item);
        }
    }
}
