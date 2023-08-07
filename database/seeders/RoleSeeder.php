<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Owner'],
            ['name' => 'Super Admin'],
            ['name' => 'Head Admin'],
            ['name' => 'Admin'],
            ['name' => 'Operational'],
            ['name' => 'Member'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
