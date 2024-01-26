<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
use HasFactory;

protected $fillable = ['topping', 'price', 'unit_id'];

// Define the many-to-many relationship with Menus
    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'ingredient_menu', 'ingredients_id', 'menu_id');
    }


// Define the relationship with Unit
public function unit()
{
return $this->belongsTo(Units::class, 'unit_id');
}
}
