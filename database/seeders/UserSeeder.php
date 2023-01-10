<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'John',
            'last_name' => 'Inga Lapa',
            'username' => 'easye',
            'email' => 'johningalapa@gmai.com',
            'password' => bcrypt('12345678'),
            'country' => 1

        ]);

        User::factory(99)->create();
    }
}
