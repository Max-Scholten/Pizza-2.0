<?php

namespace Database\Seeders;

use App\Models\Units;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit = [
            ['Stuks'],
            ['Schijfjes'],
            ['Plakken'],
            ['Plakjes'],
            ['Blaadjes'],

        ];

        foreach ($unit as $maatData) {
            $unitName = $maatData[0];

            Units::create([
                'unit' => $unitName,
            ]);
        }
    }
}
