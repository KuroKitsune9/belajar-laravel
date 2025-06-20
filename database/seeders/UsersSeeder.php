<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin' => 1
        ]);
        \App\Models\User::create([
            'name' => 'member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin' => 0
        ]);
    }
}
