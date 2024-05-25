<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'categories_id',
        'price',
        'availibility',
        'short_description',
        'long_description'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'products_id', 'id');    
    }
}
