<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    // Define the reverse relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'status_id');
    }
}
