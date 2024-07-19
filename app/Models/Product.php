<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'condition',
        'category',
        'brand',
        'model',
        'type',
        'color',
        'storage',
        'memory',
        'operating_system',
        'signal_status',
        'image',
        'release_date',
        'rating',
        'rating_count'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function currentDiscount()
    {
        return $this->discounts()
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();
    }

}
