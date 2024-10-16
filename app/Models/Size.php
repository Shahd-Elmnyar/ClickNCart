<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'active'];

    protected $casts = [
        'name' => 'array',
        'active' => 'boolean',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
