<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'email', 'phone', 'password'];

    public function address()
    {
        return $this->hasMany(CustomerAddress::class);
    }

    public function cartItems()
    {
        return $this->hasMany(AddToCart::class, 'shoe_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
