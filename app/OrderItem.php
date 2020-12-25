<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = ['order_id', 'product_id', 'price', 'quantity'];


    public function product(){
      return $this->belongsTo(Product::class, 'product_id');
    }
}
