<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'role' => 'mentor',
            'contact' => '088223738709',
            'jobs' => 'Mobile Developer',
            'institute' => 'EAD Laboratory',
            'motto' => '',
            'email' => 'admin@gmail.com',
            'profile_url' => '1.png',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);




    }
}
