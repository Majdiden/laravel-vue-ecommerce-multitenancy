<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Freshbitsweb\LaravelCartManager\Traits\Cartable;
use App\ProductImage;
use App\Category;
use App\ProductAttribute;


class Product extends Model
{
  use Cartable;
  
    protected $fillable = [
      'name', 'sku', 'description', 'quantity', 'price', 'status', 'featured'
    ];

    protected $with = ['categories', 'attributes', 'images'];

    public function images(){
      return $this->hasMany(ProductImage::class);
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function attributes()
    {
      return $this->hasMany(ProductAttribute::class);
    }

}
