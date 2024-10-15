<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'content', 'price', 'img', 'offer_price', 'discount_type', 'discount', 'active', 'featured', 'category_id'];
    protected $casts = [
        'name' =>'array',
        'content' =>'array',
    ];

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
}
