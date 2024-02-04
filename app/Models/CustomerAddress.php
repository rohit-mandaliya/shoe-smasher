<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    public $table = 'customer_address';

    protected $fillable = ['customer_id', 'location', 'address', 'landmark', 'city', 'state', 'pincode'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
