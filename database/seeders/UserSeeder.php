<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Sigit Kurniawan', 'email' => 'sigitkurniawanmtsn@gmail.com', 'password' => Hash::make('123456789')]
        ];

        DB::table('users')->insert($data);
    }
}
