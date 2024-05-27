<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BranchUser;
use Illuminate\Support\Facades\Hash;

class BranchUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BranchUser::create([
            'branchUserId' => 'BU001',
            'branchUserName' => 'John Doe',
            'password' => Hash::make('password'),
            'address' => '123 Example St, City',
            'contactNo' => '+1234567890',
            'authenticationCode' => 'ABC123',
            'remark' => 'Sample remark',
            'isUsed' => true,
        ]);

        BranchUser::create([
            'branchUserId' => 'BU002',
            'branchUserName' => 'Jane Doe',
            'password' => Hash::make('password'),
            'address' => '123 Example St, City',
            'contactNo' => '+1234567890',
            'authenticationCode' => 'DEF456',
            'remark' => 'Sample remark',
            'isUsed' => true,
        ]);
    }
}
