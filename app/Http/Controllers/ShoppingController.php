<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use Cart;
class ShoppingController extends Controller
{
    public function store(Request $request){
    $cartitem = $request->all();

    Cart::add($cartitem);

      return response(Cart::content());

      //$userId = auth()->id();
    //  cart()->setUser($userId);

    //  return Product::addToCart($request->input('id'));
    }



    public function getCartCount(){
      return response(Cart::count());
    }



   public function showItems(){

     return response(['cartContent' => Cart::content(), 'total' => Cart::total(), 'subtotal' => Cart::subtotal()]);
   }
}
