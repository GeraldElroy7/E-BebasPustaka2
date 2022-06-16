<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        $user = [
            [
                'name' => 'Ryan Danu',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'level' => 'admin'
            ],
            [
                'name'=>'Anggun Wahyuni',
                'email'=>'pustakawan@gmail.com',
                'level'=>'pustakawan',
                'password'=> Hash::make('pustakawan'),
            ]
        ];
        
        DB::table('users')->insert($user);
    }
}
