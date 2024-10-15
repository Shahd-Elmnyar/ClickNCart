<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'content', 'img', 'price', 'offer_price', 'discount_type', 'discount', 'active', 'category_id', 'created_by'];
  // Relationship to the Category model
  public function category()
  {
      return $this->belongsTo(Category::class);
  }

  // Relationship to the User model (who created the product)
  public function creator()
  {
      return $this->belongsTo(User::class, 'created_by');
  }

  public function scopeActive($query)
  {
      return $query->where('active', true);
  }

   /**
     * The colors that belong to the product.
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'colors_products', 'product_id', 'color_id');
    }

    /**
     * The sizes that belong to the product.
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'sizes_products', 'product_id', 'size_id')
            ->withPivot('active'); // Include 'active' field from the pivot table

    }
    // get active sizes only
    public function activeSizes()
{
    return $this->sizes()->wherePivot('active', true);
}
  // get active colors only

public function activeColors()
{
    return $this->sizes()->wherePivot('active', true);
}


}
