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
            ['Groot'],
            ['Medium'],
            ['Klein'],

        ];

        foreach ($maat as $maatData) {
            $maatName = $maatData[0];

            Maat::create([
                'grote' => $maatName,
            ]);
    }
}}
