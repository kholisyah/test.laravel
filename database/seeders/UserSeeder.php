<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'nama' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
    
            ],
            [
                'nama' => 'user',
                'password' => Hash::make('user123'),
                'role' => 'user',

            ],
        ]);
    }
}