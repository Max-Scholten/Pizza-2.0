<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'toppings', 'size', 'total_price'];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
