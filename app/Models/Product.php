<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'content', 'price', 'img', 'offer_price', 'discount_type', 
        'discount', 'active', 'featured', 'category_id'
    ];

    protected $casts = [
        'name' => 'array',
        'content' => 'array',
        'price' => 'float',
        'offer_price' => 'float',
        'discount' => 'float',
        
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
