<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = ['name', 'price', 'image', 'type', 'discount', 'description', 'is_active'];

    public function stocks()
    {
        return $this->hasMany(ShoeSizeWithStock::class);
    }
}
