<?php

namespace Database\Seeders;

use App\Models\Maat;
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
            ['Klaar voor bezorgen'],
            ['Onderweg'],
            ['Bezorgd']

        ];

        foreach ($status as $statusData) {
            $statusName = $statusData[0];

            Maat::create([
                'status' => $statusName,
            ]);
        }
    }
}
