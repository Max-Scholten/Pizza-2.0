<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'ceo']);
        Role::create(['name' => 'assistent-ceo']);
        Role::create(['name' => 'finance-worker']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'user']);
    }
}
