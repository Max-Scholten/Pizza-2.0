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
        $ingredients = [
            ['Hawaii', 'Pineapple', 0.25],
            ['Margarita', 'Tomato', 0.15],
            ['Margarita', 'Cheese', 0.20],
            ['Salami', 'Salami', 0.30],
            ['BBQ chicken', 'Chicken', 0.35],
            ['Chili Taco', 'Chili', 0.25],
            ['Chili Taco', 'Beef', 0.30],
            ['Roasted Veggies', 'Bell Pepper', 0.20],
            ['Roasted Veggies', 'Zucchini', 0.25],
            ['Truffle Mushroom', 'Mushroom', 0.25],
            ['Truffle Mushroom', 'Truffle Oil', 0.40],
            ['Bacon Egg', 'Bacon', 0.30],
            ['Bacon Egg', 'Egg', 0.25],
            ['Sea Shrimp', 'Shrimp', 0.40],
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredientName = $ingredientData[1];
            $price = $ingredientData[2];

            Ingredient::create([
                'topping' => $ingredientName,
                'price' => $price,
            ]);
    }
}}
