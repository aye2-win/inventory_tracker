<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // allow these fields to be saved
    protected $fillable = [
        'category_id',
        'supplier_id',
        'name',
        'sku',
        'description',
        'purchase_price',
        'selling_price',
        'quantity',
        'reorder_level',
    ];

    // get the category of this product
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // get the supplier of this product
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    // get all stock movements of this product
    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}