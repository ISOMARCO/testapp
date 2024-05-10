<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mc Donalds',
            'email' => 'admin@testapp.com',
            'password' => '12345',
            'country' => 'AZ',
            'address' => 'Bakı Nərimanov'
        ]);

        User::create([
            'name' => 'Yasamal filialı',
            'email' => 'yasamal@testapp.com',
            'password' => '12345',
            'country' => 'AZ',
            'address' => 'Bakı Yasamal',
            'customer' => '1'
        ]);
    }
}
