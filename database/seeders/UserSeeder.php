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
     */
    public function run(): void
    {
        $users = [
            ['name' => 'owner', 'username' => 'beta0', 'password' => Hash::make('Zoadster42$@!'), 'role_id' => 1],
            ['name' => 'Bobby', 'username' => 'zoads', 'password' => Hash::make('Zoads10'), 'role_id' => 2],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
