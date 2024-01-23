<?php

namespace Database\Seeders;


use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            ['Pizza Salami', 'Deze heerlijke pizza is bedekt met een smeuïge tomatensaus en rijkelijk bestrooid met plakjes pittige salami.'],
            ['Pizza Hawaii', 'Breng een tropische twist naar je maaltijd met de pizza Hawaii. Deze heerlijke combinatie van zoet en hartig bevat tomatensaus, sappige stukjes ham, ananas en mozzarella.'],
            ['Pizza Tonno', 'Geniet van de frisse smaken van de zee met deze overheerlijke pizza tonno. De basis bestaat uit tomatensaus en mozzarella, maar de ster van de show is tonijn - mals, sappig en boordevol smaak.'],
            ['Pizza Cheese', 'Een eenvoudige maar onweerstaanbare traktatie voor kaasliefhebbers! Deze pizza is overladen met een romige mix van mozzarella, cheddar, en Parmezaanse kazen. De zachte, smeltende kaas vormt een zalige laag bovenop de perfect gebakken korst.'],
            ['Pizza Salmon', 'Duik in de wereld van luxe met de pizza salmon. Deze exquise creatie combineert romige zalm met een verrukkelijke witte saus, mozzarella en verse dille. De lichte, luchtige korst vormt het ideale canvas voor deze rijke en verfijnde smaken.'],

        ];

        foreach ($menu as $menuData) {
            $menuName = $menuData[0];
            $beschrijving = $menuData[1]; // Use index 1 for description

            Menu::create([
                'naam' => $menuName,
                'beschrijving' => $beschrijving,
                // No need to include 'afbeelding' here if it's not available in $menu  Data
            ]);
        }

    }}
