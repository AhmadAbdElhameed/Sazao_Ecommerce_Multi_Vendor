<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name'=> 'Admin',
            'username' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt(123456)
            ],
            [
            'name'=> 'Vendor',
            'username' => 'Vendor',
            'email' => 'vendor@vendor.com',
            'role' => 'vendor',
            'status' => 'active',
            'password' => bcrypt(123456),
            ],
            [
            'name'=> 'User',
            'username' => 'User',
            'email' => 'user@user.com',
            'role' => 'user',
            'status' => 'active',
            'password' => bcrypt(123456),
            ]
        ]);
    }
}
