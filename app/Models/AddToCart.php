<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'customer_id', 'shoe_id', 'size', 'quantity'];

    public function shoes()
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }
}
