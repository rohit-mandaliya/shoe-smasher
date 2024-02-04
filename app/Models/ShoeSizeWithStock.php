<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeSizeWithStock extends Model
{
    use HasFactory;

    protected $fillable = ['shoe_id', 'size', 'stock'];

    public $timestamps = false;

    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }
}
