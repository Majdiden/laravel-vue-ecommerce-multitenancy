<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use App\ProductAttribute;

class ProductAttributeController extends Controller
{
    public function loadAttributes(){
      $attributes = Attribute::all();

      return response()->json($attributes);
    }

    public function productAttributes(Request $request){
      $product = ProductAttribute::findOrFail($request->id);

      return response()->json($product->attributes);
    }

    public function loadValues(Request $request){
      $attribute = Attribute::findOrFail($request->id);


      return response()->json($attribute->values);
    }

    public function addAttribute(Request $request){
      $productAttribute = ProductAttribute::create($request->all());
      return response()->json($productAttribute);
    }

    public function deleteAttribute(Request $request){
      $productAttribute = ProductAttribute::findOrFail($request->id);

      $productAttribute->delete();
    }
}
