<?php

namespace App;
use Illuminate\Support\Str;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';

  protected $fillable = [
      'name', 'slug', 'description', 'parent_id', 'featured', 'image'
  ];

  protected $casts = [
      'parent_id' =>  'integer',
      'featured'  =>  'boolean'
  ];

  public function setNameAttribute($value)
      {
            $this->attributes['name'] = $value;
            $this->attributes['slug'] = Str::slug($value);
      }

  public function parent()
      {
            return $this->belongsTo(Category::class, 'parent_id');
      }
  public function children()
      {
            return $this->hasMany(Category::class, 'parent_id');
      }

      public function products(){
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
      }
}
