<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Order;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
      $this->orderRepository = $orderRepository;
    }

    public function placeoOrder(Request $request)
    {
      $order = $this->orderRepository->storeOrderDetails($request->all());
    }
}
