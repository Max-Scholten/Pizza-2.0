<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'beschrijving', 'afbeelding', 'user_id'];

// Define the relationship with Ingredient
    public function Ingredient()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
