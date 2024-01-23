<?php
namespace App\Models;

use Database\Seeders\IngredientenSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','menu_id','grote_id', 'ingredients_id', 'status_id'];

    // Define relationships
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function maat()
    {
    return $this->belongsTo(Maat::class, 'grote_id');
    }

    public function ingredient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    return $this->belongsTo(IngredientenSeeder::class, 'ingredient_id');
    }

    public function status()
    {
    return $this->belongsTo(Status::class, 'status_id');
    }
}
