<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        User::factory()->create([
            'name' => 'test user',
            'password' => bcrypt('password'),
            'email' => 'test@yahoo.com',
        ]);
    }
}
