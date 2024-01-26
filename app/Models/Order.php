<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'menu_id', 'grote_id', 'ingredients_id', 'status_id'];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function maat()
    {
        return $this->belongsTo(Maat::class, 'grote_id');
    }

    public function z()
    {
        return $this->belongsTo(Ingredient::class, 'ingredients_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
