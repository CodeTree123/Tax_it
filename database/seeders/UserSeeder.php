<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
      User::create([
            'name'=> 'Admin',
            'email'=> 'admin@gmail.com',
            'phone'=> '0001',
            'Company_name'=> 'textile',
            'address'=> 'Uttara,Dhaka',
            'role_id'=>1,
            'password'=> Hash::make('taxadmin'),
      ]);
    }
}
