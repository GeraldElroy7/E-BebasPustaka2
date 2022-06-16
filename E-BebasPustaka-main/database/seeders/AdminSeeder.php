<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'nip' => '12345',
            'password' => Hash::make('admin'),
            'updated_at' => now(),
            'created_at' => now()
        ]);

    }
}
