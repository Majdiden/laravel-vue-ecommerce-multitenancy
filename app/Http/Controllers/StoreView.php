<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreView extends Controller
{
    public function index() {
      return view('store');
    }


    public function loadStoreData() {
      return tenant('id');
    }
}
