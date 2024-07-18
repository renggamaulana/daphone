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
        'release_date'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
