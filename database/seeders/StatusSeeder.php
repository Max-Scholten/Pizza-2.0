<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [

            ['type' => 'Wachtrij','created_at' => now()],
            ['type' => 'Voorbereiding','created_at' => now()],
            ['type' => 'In de oven','created_at' => now()],
            ['type' => 'Onderweg','created_at' => now()],
            ['type' => 'Bezorgd','created_at' => now()],
        ];
        foreach ($status as $statuss) {
            DB::table('$status')->insert($statuss);
        }
    }
}
