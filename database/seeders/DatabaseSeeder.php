<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UnitsSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(MaatSeeder::class);
        $this->call(IngredientenSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);



    }
}
