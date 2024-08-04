<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
        'guarantee',
        'image',
        'release_date',
        // 'rating',
        // 'rating_count',
        'slug'
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

    public static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            // Generate slug from nama, storage, and color
            $product->slug = Str::slug($product->name . '-' . $product->storage . '-' . $product->color);
        });
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
