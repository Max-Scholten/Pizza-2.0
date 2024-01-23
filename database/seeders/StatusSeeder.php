<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['Aan het verwerken'],
            ['Aan het bereiden'],
            ['In de oven'],
            ['Klaar voor bezorging'],
            ['Onderweg'],
            ['Bezorgd'],

        ];

        foreach ($status as $statusData) {
            $statusValue = $statusData[0];

            Status::create([
                'status' => $statusValue
            ]);
        }

    }
}
