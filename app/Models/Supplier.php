<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    // allow these fields to be saved
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    // get all products from this supplier
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}