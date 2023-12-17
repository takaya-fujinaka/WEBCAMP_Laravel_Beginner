<?php

namespace Database\seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\seeder;

class AdminAuthUser extends seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_users')->insert([
            'login_id' => 'hogemin',
            'password' => Hash::make('pass'),
            ]);
    }
}
