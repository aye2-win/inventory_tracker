<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovement extends Model
{
    // allow these fields to be saved
    protected $fillable = [
        'product_id',
        'type',
        'quantity',
        'note',
    ];

    // get the product related to this stock movement
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}