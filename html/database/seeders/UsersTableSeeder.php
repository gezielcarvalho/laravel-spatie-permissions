<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Modify before seeding, if you wish
        DB::table('users')->insert(array(
            0 =>
                array(
                    'name' => 'User Name',
                    'email' => 'user@name.com',
                    'password' => Hash::make('A_1234567'),
                ),
        ));
    }

}
