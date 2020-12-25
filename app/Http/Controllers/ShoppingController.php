<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use App\Http\Resources\CartCollection;
class ShoppingController extends Controller
{
    public function store(Request $request){
      $userId = auth()->id();
      cart()->setUser($userId);

      return Product::addToCart($request->input('id'));
    }

   public function showItems(){
     $userId = auth()->id();
     cart()->setUser($userId);
     return cart()->toArray();



   }
}
