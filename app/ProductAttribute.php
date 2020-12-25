<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Attribute;

class ProductAttribute extends Model
{
  /**
  * @var string
  */
 protected $table = 'product_attributes';

 /**
  * @var array
  */
  protected $fillable = ['attribute_id', 'product_id', 'value', 'quantity', 'price'];


 /**
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function product()
 {
     return $this->belongsTo(Product::class);
 }

 public function attribute()
 {
    return $this->belongsTo(Attribute::class);
  }



}
