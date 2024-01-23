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
            'naam' => 'admin',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$9tSWrWdKC2.A1W0L2hDpweqJieqD/UU/CspiTRw2hA8rUkXMUOtVm', // password: s3i31v6/h%83!\G1
        ])->assignRole('customer','employee','manager','assistent-ceo','ceo', 'admin');


        // CEO account
        User::create([
            'naam' => 'ceo',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'ceo@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$OyLqqeVRDY4D1PD9O1bgu.PdWY0c.H1ckWHeGmSySnHu5q9fraSpC', // password: U{{]Mz+g5!7qF8?4
        ])->assignRole('customer','employee','manager','assistent-ceo','ceo');

        // Assistent-CEO account
        User::create([
            'naam' => 'assistent-ceo',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'assistent-ceo@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$peG95sTBmiFkp1b99NjepuA9SzSho0RQo1vL6VXFNPQVXmYNsveta', // password: V9Y&7QkHRgam_Y=6
        ])->assignRole('customer','employee','manager','assistent-ceo');

        // Finance-Worker account
        User::create([
            'naam' => 'finance-worker',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'finance-worker@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$vh6cNGFIKG67LHa0WTOSjevIpyv.QLF2Y3bvHrrhfvPfuYk1p8VFS', // password: .1LnJP)4I,Y-04(u
        ])->assignRole('customer','employee','manager','finance-worker');

        // Manager account
        User::create([
            'naam' => 'manager',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'manager@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$ZSjhl5zofXiWb83IqtzPXu6lp3SIvU0H9Brx3iysimIQF.4tN.Pl2', // password: aLN$w7gfmb!4dSVH
        ])->assignRole('customer','employee','manager');

        // Employee account
        User::create([
            'naam' => 'employee',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'employee@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$X5fwZMxZTt4bhBke.kf4EO.oOPSlVncV15SgJVvxIohHAHRdboTwq', // password: tri!JP2y9nB5l'vE
        ])->assignRole('customer','employee');

        // User account
        User::create([
            'naam' => 'customer',
            'straat' => '',
            'huisnummer' => '',
            'woonplaats' => '',
            'tel' => '',
            'email' => 'customer@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$XoG0Cn7Wlw/jaKyCS2C1Ke7wo3eaS2s8BtbFUE8CWe19LdQZeOakS', // password: p5YcnL4pvyeoi}TB
        ])->assignRole('customer');

    }
}
