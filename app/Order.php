<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\OrderItem;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method', 'first_name', 'last_name', 'address', 'number' ,'notes'];



    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }

    public function items(){
      return $this->hasMany(OrderItem::class);
    }
}
