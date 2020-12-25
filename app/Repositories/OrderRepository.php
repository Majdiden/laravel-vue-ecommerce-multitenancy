<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Product;
use App\Order;
use App\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository implements OrderContract
{
  public function __construct(Order $model)
  {
    $this->model = $model;
  }



    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
  {
      return $this->all($columns, $order, $sort);
  }



  public function findOrderByNumber($orderNumber)
  {
      return Order::where('order_number', $orderNumber)->first();
  }



  public function storeOrderDetails(array $params)
  {
    cart()->setUser(auth()->user()->id);
    $order = Order::create([
      'order_number'      =>  'ORD-'.strtoupper(uniqid()),
       'user_id'           => auth()->user()->id,
       'status'            =>  'pending',
       'grand_total'       =>  cart()->getSubtotal(),
       'item_count'        =>  0,
       'payment_status'    =>  0,
       'payment_method'    =>  null,
       'first_name'        =>  $params['first_name'],
       'last_name'         =>  $params['last_name'],
       'address'           =>  $params['address'],
       'number'            =>  $params['number'],
       'notes'             =>  $params['notes']
    ]);

    if($order)
    {

      $items = cart()->items();
      foreach ($items as $item) {
        $product = Product::where('name', $item['name'])->first();

        $orderItem = new OrderItem([
          'product_id' => $product->id,
          'quantity' => $item['quantity'],
          'price' => $item['price'],
        ]);

        $order->items()->save($orderItem);
      }
    }
    return $order;

  }


}
