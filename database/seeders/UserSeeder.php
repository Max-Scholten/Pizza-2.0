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
        // Admin account
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: s3i31v6/h%83!\G1
        ])->assignRole('user', 'manager', 'admin');

        // CEO account
        User::create([
            'name' => 'ceo',
            'email' => 'ceo@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$M3O7pZQXEgiLdwPejFGnN.hVfwGepOGcX8OiprJA5wCmBcuwvRJV6', // password: U{{]Mz+g5!7qF8?4
        ])->assignRole('user', 'manager', 'ceo','admin');

        // Assistent-CEO account
        User::create([
            'name' => 'assistent-ceo',
            'email' => 'assistent-ceo@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: V9Y&7QkHRgam_Y=6
        ])->assignRole('user', 'manager','assistent-ceo','ceo', 'admin');

        // Finance-Worker account
        User::create([
            'name' => 'finance-worker',
            'email' => 'finance-worker@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: .1LnJP)4I,Y-04(u
        ])->assignRole('user', 'manager','finance-worker','assistent-ceo','ceo', 'admin');

        // Manager account
        User::create([
            'name' => 'manager',
            'email' => 'manager@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: aLN$w7gfmb!4dSVH
        ])->assignRole('manager');

        // Employee account
        User::create([
            'name' => 'employee',
            'email' => 'employee@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: tri!JP2y9nB5l'vE
        ])->assignRole('manager');

        // User account
        User::create([
            'name' => 'user',
            'email' => 'user@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password: p5YcnL4pvyeoi}TB
        ])->assignRole('user');

    }
}
