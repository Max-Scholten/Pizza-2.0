<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredient = [
            ['Pineapple', 0.25],
            ['Tomato', 0.15],
            ['Cheese', 0.20],
            ['Salami', 0.30],
            ['Chicken', 0.35],
            ['Beef', 0.30],
            ['Bell Pepper', 0.20],
            ['Zucchini', 0.25],
            ['Mushroom', 0.25],
            ['Bacon', 0.30],
        ];

        foreach ($ingredient as $ingredientData) {
            $ingredientName = $ingredientData[0];
            $price = $ingredientData[1];

            Ingredient::create([
                'topping' => $ingredientName,
                'price' => $price,
            ]);
    }
}}
