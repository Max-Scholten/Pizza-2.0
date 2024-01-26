<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = ['units'];

    // Define the reverse relationship with Ingredient
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'unit_id');
    }
}
