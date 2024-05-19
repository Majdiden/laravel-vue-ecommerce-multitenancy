<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Product;
use App\Order;
use App\OrderItem;
use Cart;
use App\Contracts\OrderContract;

class OrderRepository implements OrderContract
{
  public function __construct(Order $model)
  {
    $this->model = $model;
  }



    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
  {
      $orders = Order::all();
      return $orders;
  }



  public function findOrderByNumber($id)
  {
      return Order::where('id', $id)->first();
  }



  public function storeOrderDetails(array $params)
  {
    $order = Order::create([
      'order_number'      =>  '#'.mt_rand( 100000, 999999 ),
       'user_id'           => 1,
       'status'            =>  'pending',
       'grand_total'       =>  Cart::total(1, "", "."),
       'item_count'        =>  Cart::count(),
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
      $order->created_at->format('Y-m-d');
      $items = Cart::content();
      foreach ($items as $item) {
        $product = Product::where('name', $item->name)->first();

        $orderItem = new OrderItem([
          'product_id' => $product->id,
          'quantity' => $item->qty,
          'price' => $item->qty,
        ]);

        $order->items()->save($orderItem);
      //  $productQty = $product->quantity - $item->qty;
        $product->decrement('quantity', $item->qty);
      }
    }
    return $order;

  }

  public function updateOrder(array $params){


      $order = $this->findOrderByNumber($params['id']);
      //$orderStatus = $collection['status'];
      $order->update($params);

  }


}
