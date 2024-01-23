<?php

namespace Database\Seeders;

use App\Models\Maat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maat = [
            ['Groot','1.2'],
            ['Medium','1.0'],
            ['Klein','0.8'],

        ];

        foreach ($maat as $maatData) {
            $maatName = $maatData[0];
            $maatFactor = $maatData[1];

            Maat::create([
                'grote' => $maatName,
                'factor' => $maatFactor,
            ]);
    }
}}
