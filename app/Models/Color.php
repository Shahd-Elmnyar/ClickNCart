<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The products that have this color.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'colors_products', 'color_id', 'product_id');

    }
    //get only the colors  for a product,
    public function activeForProduct(Product $product)
{
    return $this->products()->wherePivot('active', true)->where('product_id', $product->id)->exists();
}

}
