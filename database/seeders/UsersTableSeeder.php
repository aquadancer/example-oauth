<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        User::create([
            'name' => 'admin@admin.admin',
            'email' => 'admin@admin.admin',
            'password' => 'r',
        ]);
    }
}
