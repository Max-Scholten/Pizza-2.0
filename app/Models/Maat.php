<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maat extends Model
{
    use HasFactory;

    protected $fillable = ['grote', 'factor'];

    // Define the one-to-many relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'grote_id');
    }
}
