<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\GetPurchaseList;
use App\Models\GetPurchaseListsItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some purchase lists
        $purchaseLists = GetPurchaseList::factory()->count(5)->create();

        // Create some purchase lists items
        foreach ($purchaseLists as $purchaseList) {
            GetPurchaseListsItem::factory()->count(3)->create([
                'purchase_list_id' => $purchaseList->id,
            ]);
        }
    }

}