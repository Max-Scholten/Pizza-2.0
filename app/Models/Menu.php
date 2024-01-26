<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'beschrijving', 'prijs', 'afbeelding', 'user_id'];

    // Define the many-to-many relationship with Ingredient (plural


    // Define the reverse relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
