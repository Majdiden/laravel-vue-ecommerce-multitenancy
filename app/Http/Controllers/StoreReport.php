<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;

class StoreReport extends Controller
{
    public function revenue(){
      $total = DB::table('orders')->where('status', 'completed')->sum('grand_total');
      return $total;
    }

    public function sales(){
      $total_sales = Order::where('status', 'completed')->count();
      return $total_sales;
    }

    public function orders(){
      $total_orders = Order::all()->count();
      return $total_orders;
    }
}
