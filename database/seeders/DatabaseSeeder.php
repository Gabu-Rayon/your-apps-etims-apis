<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\GetPurchaseList;
use App\Models\GetPurchaseListsItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CodeSeeder::class);
        $this->call(DetailSeeder::class);
        $this->call(ItemClassificationSeeder::class);
        $this->call(NoticeSeeder::class);
    }

}