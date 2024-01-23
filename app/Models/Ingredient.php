<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\TimeSourceException;

class Ingredient extends Model
{
use HasFactory;

    protected $fillable = ['topping', 'price','unit_id'];
    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }
}
